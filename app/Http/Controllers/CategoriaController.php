<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::get();
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

        //Almacenamiento
        $categoria = new Categoria;
        $categoria->categoria = $request->categoria;
        $categoria->save();

        //Redireccionar
        return redirect()->route('categoria.show' , $categoria);
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
        return view('categoria.edit' , compact('categorias'));
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
            'categoria' => 'required|string'
        ]);

        //update
        $categoria->categoria = $request->categoria;
        $categoria->save();

        //Redireccionar
        return redirect()->route('categoria.show' , $categoria);
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
     *
     * @return \Illuminate\Http\Response
     */
    public function misDocumentos(Categoria $categoria)
    {
        $categoria = Categoria::find($categoria->id)->with('documentos')->get();
        return view('categoria.index' , compact('categorias')); 
    }
}
