@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INFORMACIÓN DE ARCHIVO') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('archivo.edit' , $archivo->id) }}"
                    enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="dropdown col-md-6" >
                                <select id="categoria" name="categoria" class="form-control" disabled>
                                    <option value="{{ $archivo->documento->categoria_id }}">{{ $archivo->documento->categoria->categoria }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>
                            <div class="dropdown col-md-6" >
                                <select id="documento" name="documento" class="form-control" disabled>
                                    <option value="{{ $archivo->documento_id }}">{{ $archivo->documento->documento }}</option>                             
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefijo" class="col-md-4 col-form-label text-md-right">{{ __('Prefijo') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="lbl_prefijo"><strong>{{ $archivo->documento->prefijo }}</strong></span>
                                    </div>
                                    <input id="referencia" type="text" class="form-control{{ $errors->has('referencia') ? ' is-invalid' : '' }}" name="referencia" value="{{ $archivo->referencia }}" readonly="readonly">
                                </div>
                                
                            </div>
                        </div>    

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Archivo') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $archivo->nombre }}"readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{ $archivo->fecha }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="anio" class="col-md-4 col-form-label text-md-right">{{ __('Año') }}</label>

                            <div class="col-md-6">
                                <input id="anio" type="text" class="form-control{{ $errors->has('anio') ? ' is-invalid' : '' }}" name="anio" value="{{ $archivo->anio }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">                                
                                <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" name="descripcion" rows="3" readonly="readonly">{{ $archivo->descripcion }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ubicacion_fisica" class="col-md-4 col-form-label text-md-right">{{ __('Ubicacion') }}</label>

                            <div class="col-md-6">
                                <input id="ubicacion_fisica" type="text" class="form-control{{ $errors->has('ubicacion_fisica') ? ' is-invalid' : '' }}" name="ubicacion_fisica" value="{{ $archivo->ubicacion_fisica }}" readonly="readonly">

                            </div>
                        </div>   

                        <div class="form-group row">
                            <label for="archivo_cargado" class="col-md-4 col-form-label text-md-right">{{ __('Archivo cargado') }} </label>

                            <div class="col-md-6" align="center">
                                <a class="btn btn-danger" href="..{{ Storage::url($archivo->ruta) }}" target=”_blank” ><strong>{{ __('Ver PDF') }} </strong></a>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6" align="left">
                                <a href="{{ route('archivo.index') }}" class="btn btn-success">{{ __('Atras') }}</a>
                            </div>
                            <div class="col-md-6" align="right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                                    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
