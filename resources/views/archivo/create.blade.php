@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
          <h3 class="title">{{ __('REGISTRAR ARCHIVO') }}</h3>
          <p>{{ __('A continuación, ingrese los datos básicos del archivo a cargar según la categoría seleccionada.') }}</p>
      </div>
      <div class="col-md-4">
            <form method="GET" action="{{ route('archivo.index') }}">
                <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right"> {{ __('IR A LA LISTA DE ARCHIVOS') }}</button>
                {{ csrf_field() }}
            </form>
      </div>        
    </div>
</div>
<section class="section">
  <div class="row sameheight-container">
      <div class="col-md-12">
          <div class="card sameheight-item">
              <div class="card-block">
                  <section class="section">
                    <form method="POST" action="{{ route('archivo.store') }}"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Selecciona una Categoría') }}</label>

                            <div class="dropdown col-md-6" >
                                <select id="categoria" name="categoria" class="form-control" onchange="loadDocuments();">
                                    <option value="null" disabled selected>Categorías</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" data-info="{{ $categoria->documentos }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>
                            <div class="dropdown col-md-6" >
                                <select id="documento" name="documento" class="form-control" onchange="setPrefix()">
                                    <option value="null" disabled selected>Tipo Documento</option>                             
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
                                <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" name="descripcion" rows="3" required autofocus></textarea>
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

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right">
                                    {{ __('Registrar Archivo') }}
                                </button>
                            </div>
                        </div>
                  </section>
                  <section class="section">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  </section>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection

