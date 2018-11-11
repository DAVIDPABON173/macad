<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Documento;
use App\Utility\Respuesta;
use App\Utility\Util;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
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
        $categorias = Categoria::paginate(10);
        return view('categoria.index' , compact('categorias')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
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
            'categoria' => 'required|string',
            'descripcion' => 'required|string'
        ]);

        try{
            //Almacenamiento
            $categoria = new Categoria;
            $categoria->categoria = $request->categoria;
            $categoria->descripcion = $request->descripcion;
            $categoria->save();

            $respuesta=  Util::getRespuestaFlash(Respuesta::get(1), ' -Categoría registrada.');
        
        }catch(QueryException $e){

            $respuesta=  Util::getRespuestaFlash(Respuesta::get($e->errorInfo[1]));
        }finally{
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            //Redireccionar
            return redirect()->route('categoria.create');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view('categoria.show' , compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria.edit' , compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //validacion
        $this->validate($request, [
            'categoria' => 'required|string',
            'descripcion' => 'required|string'
        ]);

        try{
            //update
            $categoria->categoria = $request->categoria;
            $categoria->descripcion = $request->descripcion;
            $categoria->save();

            $respuesta=  Util::getRespuestaFlash(Respuesta::get(3, ' -Categoría Actualizada.'));
        
        }catch(QueryException $e){
        
            $respuesta=  Util::getRespuestaFlash(Respuesta::get($e->errorInfo[1]));
        
        }finally{
            session()->flash($respuesta['tipo'] , $respuesta['msj']);
            //Redireccionar
            return redirect()->route('categoria.show',  compact('categoria'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }

    /**
     * Metodo que lista todos loos documentos que pertenecen a una categoria
     * @return \Illuminate\Http\Response
     */
    public function misDocumentos(Categoria $categoria)
    {
        $documentos = Documento::where(['categoria_id' => $categoria->id])->with('categoria')->paginate(4);
        return view('documento.index' , compact('documentos'));
    }
}
