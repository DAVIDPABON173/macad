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
                            <label for="referencia" class="col-md-4 col-form-label text-md-right">{{ __('Referencia') }}</label>

                            <div class="col-md-6">
                                <input id="referencia" type="text" class="form-control{{ $errors->has('referencia') ? ' is-invalid' : '' }}" name="referencia" value="{{ $archivo->referencia }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Archivo') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $archivo->nombre }}" readonly="readonly">
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
                                <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ $archivo->descripcion }}" readonly="readonly">
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
                                <button type="submit" class="btn btn-success" method="GET" onclick= "{{ route('archivo.index')}}">
                                    {{ __('Atras') }}
                                </button>
                                    
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
