<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Categoria;
use App\Archivo;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documento::with('categoria')->get();
        $documentos = Documento::paginate(4);
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

        //Almacenamiento
        $documento = new Documento;
        $documento->categoria_id = $request->categoria_id;
        $documento->documento = $request->documento;
        $documento->prefijo = $request->prefijo;
        $documento->save();

        //Redireccionar
        return redirect()->route('documento.show', compact($documento));
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

        //Almacenamiento
        $documento->categoria_id = $request->categoria_id;
        $documento->documento = $request->documento;
        $documento->prefijo = $request->prefijo;
        $documento->save();

        //Redireccionar
        return redirect()->route('documento.show', compact('documento'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        //
    }


    /**
     * Metodo que lista todos loos documentos que pertenecen a una categoria
     * @return \Illuminate\Http\Response
     */
    public function misArchivos(Categoria $documento)
    {
        $archivos = Archivo::where(['documento_id' => $documento->id])->paginate(4);
        return view('archivo.index' , compact('archivos'));
    }


}
