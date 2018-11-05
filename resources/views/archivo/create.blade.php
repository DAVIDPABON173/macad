@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('REGISTRAR ARCHIVO') }}</div>

                <div class="card-body">
                    
                    <div class="alert alert-info" role="alert">
                        <strong>{{ __('A continuación, ingrese los datos básico del archivo a cargar según la categoría seleccionada.') }}</strong>
                    </div>
                        
                    
                    <form method="POST" action="{{ route('archivo.store') }}"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Selecciona una Categoría') }}</label>

                            <div class="dropdown col-md-6" >
                                <select id="categoria" name="categoria" class="form-control" onchange="loadDocuments();">
                                    <option value="null" disabled selected>Categorías</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->documentos }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>
                            <div class="dropdown col-md-6" >
                                <select id="documento" name="documento" class="form-control" onchange="setPrefix()">
                                    <option value="null" disabled selected>Documentos</option>                             
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefijo" class="col-md-4 col-form-label text-md-right">{{ __('Prefijo') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="lbl_prefijo"><strong>{{ __('X-YY-Z-') }}</strong></span>
                                    </div>
                                    <input id="referencia" type="text" class="form-control{{ $errors->has('referencia') ? ' is-invalid' : '' }}" name="referencia" value="{{ old('referencia') }}" required autofocus>
                                    @if ($errors->has('referencia'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('referencia') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Archivo') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">{{ __('Fecha') }}</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{ old('fecha') }}" required autofocus>

                                @if ($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="anio" class="col-md-4 col-form-label text-md-right">{{ __('Año') }}</label>

                            <div class="col-md-6">
                                <input id="anio" type="text" class="form-control{{ $errors->has('anio') ? ' is-invalid' : '' }}" name="anio" value="{{ old('anio') }}" required autofocus>

                                @if ($errors->has('anio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('anio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">                                
                                <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" rows="3" required autofocus></textarea>
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ubicacion_fisica" class="col-md-4 col-form-label text-md-right">{{ __('Ubicacion') }}</label>

                            <div class="col-md-6">
                                <input id="ubicacion_fisica" type="text" class="form-control{{ $errors->has('ubicacion_fisica') ? ' is-invalid' : '' }}" name="ubicacion_fisica" value="{{ old('ubicacion') }}" required autofocus>

                                @if ($errors->has('ubicacion_fisica'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ubicacion_fisica') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="archivo" class="col-md-4 col-form-label text-md-right">{{ __('Archivo') }}</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input id="archivo" name="archivo" type="file" class="custom-file-input {{ $errors->has('archivo') ? ' is-invalid' : '' }}" value="{{ old('archivo') }}" required autofocus onchange="getFileName('archivo','custom-file-label')">
                                    <label class="custom-file-label" for="archivo">Seleccionar Archivo</label>
                                    @if ($errors->has('archivo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('archivo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar Archivo') }}
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
