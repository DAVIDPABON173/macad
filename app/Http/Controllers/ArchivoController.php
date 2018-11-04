<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Documento;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos = Archivo::with('documento')->get();
        $archivos = Archivo::paginate(4);
        return view('archivo.index' , compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivo.create');
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
            'referencia' => 'required|string',
            'nombre' => 'required|string',
            'fecha' => 'required|date',
            'anio' => 'required|string',
            'descripcion' => 'required|string',
            'archivo' => 'required|file'
        ]);

        $ruta = $request->file('archivo')->store('public/'.date('Y').'/'.$this->getNumeroSemana().'/documento');

        //Almacenamiento
        $archivo = new Archivo;
        $archivo->referencia = $request->referencia;
        $archivo->nombre = $request->nombre;
        $archivo->fecha = $request->fecha;
        $archivo->anio = $request->anio;
        $archivo->descripcion = $request->descripcion;
        $archivo->ubicacion_fisica = $request->ubicacion_fisica;
        $archivo->documento_id = 1;
        $archivo->ruta = $ruta;
        $archivo->save();

        //Redireccionar
        return redirect()->route('archivo.show' , $archivo);
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
        return view('archivo.edit' , compact('archivo'));
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
        $archivo->documento_id = 1;
        $archivo->save();

        //Redireccionar
        return redirect()->route('archivo.show' , $archivo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        //
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
