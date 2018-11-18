<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Categoria;
use App\Utility\Respuesta;
use App\Utility\Util;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ArchivoController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos = Archivo::with('documento')->paginate(15);
        return view('archivo.index' , compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::with('documentos')->get();
        return view('archivo.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validacion
        $this->validate($request, [
            'documento' => 'required|integer', 
            'referencia' => 'required|string',
            'nombre' => 'required|string',
            'fecha' => 'required|date',
            'anio' => 'required|string',
            'descripcion' => 'required|string',
            'archivo' => 'required|file'
        ]);

        try{
           $ruta = $request->file('archivo')->store('public/'.date('Y').'/'.$this->getNumeroSemana().'/documento');

            //Almacenamiento
            $archivo = new Archivo;
            $archivo->referencia = $request->referencia;
            $archivo->nombre = $request->nombre;
            $archivo->fecha = $request->fecha;
            $archivo->anio = $request->anio;
            $archivo->descripcion = $request->descripcion;
            $archivo->ubicacion_fisica = $request->ubicacion_fisica;
            $archivo->documento_id = $request->documento;
            $archivo->ruta = $ruta;
            $archivo->save();

            $respuesta=  Util::getRespuestaFlash(Respuesta::get(1, ' -Archivo registrado y cargado.'));
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            //Redireccionar
            return redirect()->route('archivo.show' , $archivo->id);

        }catch(QueryException $e){

            $respuesta=  Util::getRespuestaFlash(Respuesta::get($e->errorInfo[1]));
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            //Redireccionar
            return redirect()->route('archivo.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        return view('archivo.show' , compact('archivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        $categorias = Categoria::with('documentos')->get();
        return view('archivo.edit' , compact('archivo', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        //validacion
        $this->validate($request, [
            'referencia' => 'required|string',
            'nombre' => 'required|string',
            'fecha' => 'required|date',
            'anio' => 'required|string',
            'descripcion' => 'required|string'
        ]);

        try{
            if ($request->hasFile('archivo')) {
            $ruta = $request->file('archivo')->store('public/'.date('Y').'/'.$this->getNumeroSemana().'/documento');
            $archivo->ruta = $ruta;
            }
            //update
            $archivo->referencia = $request->referencia;
            $archivo->nombre = $request->nombre;
            $archivo->fecha = $request->fecha;
            $archivo->anio = $request->anio;
            $archivo->descripcion = $request->descripcion;
            $archivo->ubicacion_fisica = $request->ubicacion_fisica;
            $archivo->documento_id = $request->documento;
            $archivo->save();

            $respuesta=  Util::getRespuestaFlash(Respuesta::get(3, ' -Archivo Actualizado.'));
        
        }catch(QueryException $e){
        
            $respuesta=  Util::getRespuestaFlash(Respuesta::get($e->errorInfo[1]));
        
        }finally{
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            //Redireccionar
            return redirect()->route('archivo.show',  compact('archivo'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        try{
            $nombre = $archivo->nombre;
            //DELETE
            if ($archivo->delete()) {
            $respuesta=Util::getRespuestaFlash(Respuesta::get(4,' -Archivo: '.$nombre.' eliminado.'));
            }else{
            $respuesta=Util::getRespuestaFlash(Respuesta::get(-4,' -Archivo: '.$nombre));
            }
        }catch(QueryException $e){
            $respuesta=  Util::getRespuestaFlash(Respuesta::get($e->errorInfo[1]));
        }finally{
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            //Redireccionar
            return redirect()->route('archivo.index');
        }
    }

    public function find(){
        return view('archivo.find');
    }

    public function showArchivosFind(Request $request){
        //validacion
        $this->validate($request, [
            'atributo' => 'required|string',
            'valor' => 'required|string'
        ]);
        try {
            $var = Util::getColumnaArchivoTabla($request->atributo);
            if(is_null($var)){
                $respuesta=  Util::getRespuestaFlash(Respuesta::get(102, ' -Campo/valor desconocido'));
                session()->flash($respuesta['tipo'] , $respuesta['msj']);
                //Redireccionar
                return view('archivo.find');
            }
            $archivos = Archivo::where($var, 'like', '%'.$request->valor.'%')->with('documento')->paginate(15);
            if($archivos){
                $respuesta=  Util::getRespuestaFlash(Respuesta::get(2, ' -Se encontró Archivo(s) por: "'.$request->valor.'"'));
                session()->flash($respuesta['tipo'] , $respuesta['msj']);
                //Redireccionar
                return view('archivo.index' , compact('archivos'));
            }
            $respuesta=  Util::getRespuestaFlash(Respuesta::get(0, ' -Sin resultados...'));
                session()->flash($respuesta['tipo'] , $respuesta['msj']);
                //Redireccionar
                return view('archivo.find' );
            
        } catch (QueryException $e) {
            $respuesta=  Util::getRespuestaFlash(Respuesta::get($e->errorInfo[1]));
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            //Redireccionar
            return redirect()->route('archivo.find');
        }
    }


    /**
     * obtener el numero de semanas, segun la fecha actual.
     *
     * @return integer
     */
    private function getNumeroSemana(){
        //donde:       
        #W (mayúscula) te devuelve el número de semana
        #w (minúscula) te devuelve el número de día dentro de la semana (0=domingo, #6=sabado)
        return $semana = date('W',  mktime(0,0,0,intval(date("m")),intval(date("d")),intval(date("Y"))));  
    }

    
    
}
