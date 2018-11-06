@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDITAR ARCHIVO') }}</div>
                <input type="hidden" name="datos" id="datos" value="{{$archivo}}">
                <div class="card-body">
                    <form method="POST" action="{{ route('archivo.update' , $archivo->id) }}"
                    enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

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
                                    <option value="{{ $archivo->documento_id }}" selected>{{ $archivo->documento->documento }}</option>                           
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
                                    <input id="referencia" type="text" class="form-control{{ $errors->has('referencia') ? ' is-invalid' : '' }}" name="referencia" value="{{ $archivo->referencia }}" required autofocus>
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
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $archivo->nombre }}" required autofocus>

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
                                <input id="fecha" type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{ $archivo->fecha }}" required autofocus>

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
                                <input id="anio" type="text" class="form-control{{ $errors->has('anio') ? ' is-invalid' : '' }}" name="anio" value="{{ $archivo->anio }}" required autofocus>

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
                                <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" name="descripcion" rows="3" required autofocus>{{ $archivo->descripcion }}</textarea>
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
                                <input id="ubicacion_fisica" type="text" class="form-control{{ $errors->has('ubicacion_fisica') ? ' is-invalid' : '' }}" name="ubicacion_fisica" value="{{ $archivo->ubicacion_fisica }}" required autofocus>

                                @if ($errors->has('ubicacion_fisica'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ubicacion_fisica') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="archivo_cargado" class="col-md-4 col-form-label text-md-right">{{ __('Archivo cargado') }} </label>

                            <div class="col-md-6" align="center">
                                <a class="btn btn-danger" href="../..{{ Storage::url($archivo->ruta) }}" target=”_blank” ><strong>{{ __('Ver PDF') }} </strong></a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="archivo" class="col-md-4 col-form-label text-md-right">{{ __('Archivo') }}</label>

                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input id="archivo" name="archivo" type="file" class="custom-file-input {{ $errors->has('archivo') ? ' is-invalid' : '' }}" value="{{ old('archivo') }}" onchange="getFileName('archivo','custom-file-label')">
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
                            <div class="col-md-6" align="left">
                                <button type="submit" class="btn btn-danger" action="{{ route('archivo.show' , $archivo->id) }}">
                                    {{ __('Cancelar') }}
                                </button>
                                    
                            </div>
                            <div class="col-md-6" align="right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
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
<script>
    $(document).ready(function(){
    defaulCmbArchivoEdit();
    });
</script>
