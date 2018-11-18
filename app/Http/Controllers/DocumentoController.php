<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Categoria;
use App\Archivo;
use App\Utility\Respuesta;
use App\Utility\Util;
use Illuminate\Http\Request;

class DocumentoController extends Controller
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
        $documentos = Documento::with('categoria')->paginate(10);
        return view('documento.index' , compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('documento.create', compact('categorias'));
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
            'categoria_id' => 'required|integer',
            'documento' => 'required|string',
            'prefijo' => 'required|string'
        ]);

        try{
            //Almacenamiento
            $documento = new Documento;
            $documento->categoria_id = $request->categoria_id;
            $documento->documento = $request->documento;
            $documento->prefijo = $request->prefijo;
            $documento->save();

            $respuesta=  Util::getRespuestaFlash(Respuesta::get(1,' -Tipo de Documento registrado.'));
        
        }catch(QueryException $e){

            $respuesta=  Util::getRespuestaFlash(Respuesta::get($e->errorInfo[1]));
        }finally{
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            //Redireccionar
            return redirect()->route('documento.show', compact('documento'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        return view('documento.show' , compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        $categorias = Categoria::where('id' , '<>' , $documento->categoria_id)->get();
        return view('documento.edit' , compact('documento' , 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        //validacion
        $this->validate($request, [
            'categoria_id' => 'required|integer',
            'documento' => 'required|string',
            'prefijo' => 'required|string'
        ]);

        try{
           //Almacenamiento
            $documento->categoria_id = $request->categoria_id;
            $documento->documento = $request->documento;
            $documento->prefijo = $request->prefijo;
            $documento->save();

            $respuesta=  Util::getRespuestaFlash(Respuesta::get(3, ' -Tipo de Documento Actualizado.'));
        
        }catch(QueryException $e){
            $respuesta=  Util::getRespuestaFlash(Respuesta::get($e->errorInfo[1]));
        }finally{
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            //Redireccionar
            return redirect()->route('documento.show',  compact('documento'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        try{
            $doc = $documento->documento;
            //DELETE
            if ($documento->delete()) {
            $respuesta=Util::getRespuestaFlash(Respuesta::get(4,' -Tipo Doc: '.$doc.' eliminado. Nota: Todos sus archivos fueron eliminados'));
            }else{
            $respuesta=Util::getRespuestaFlash(Respuesta::get(-4,' -TIPO DOC: '.$doc));
            }
        }catch(QueryException $e){
            $respuesta=  Util::getRespuestaFlash(Respuesta::get($e->errorInfo[1]));
        }finally{
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            //Redireccionar
            return redirect()->route('documento.index');
        }
    }


    /**
     * Metodo que lista todos loos documentos que pertenecen a una categoria
     * @return \Illuminate\Http\Response
     */
    public function misArchivos(Documento $documento)
    {
        $archivos = Archivo::where(['documento_id' => $documento->id])->paginate(25);

        if(sizeof($archivos)>0){
            $respuesta=  Util::getRespuestaFlash(Respuesta::get(2, ' -Lista de archivos de Tipo: '.$documento->documento));
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            return view('archivo.index' , compact('archivos'));
        }
        $respuesta=Util::getRespuestaFlash(Respuesta::get(0, ' -Sin archivos cargados de tipo: '.$documento->documento));
        session()->flash($respuesta['tipo'] , $respuesta['msj']);
        //Redireccionar
        return redirect()->route('documento.index');
    }


}
