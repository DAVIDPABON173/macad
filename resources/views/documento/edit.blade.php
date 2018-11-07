@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDITAR TIPO DOCUMENTO') }}</div>

                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                            <strong>{{ __('Tenga en cuenta, que los datos modificados sobre el tipo de documento, afectará directamente a los archivos registrados que pertenecen a este tipo de documento.') }}</strong>
                    </div>
                    
                    <form method="POST" action="{{ route('documento.update' , $documento->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-4" >
                                <select name="categoria_id" id="categoria_id" class="form-control dropdown-toggle"  required autofocus>
                                    <option value="">-- Seleccione un categoría --</option>
                                    <option selected="{{ $documento->categoria_id }}" value="{{ $documento->categoria_id }}">{{ $documento->categoria->categoria }}</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

                            <div class="col-md-6 row">
                                <input id="documento" type="text" class="col-md-8 form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" value="{{ ($documento->documento) }}" required autofocus>

                                @if ($errors->has('documento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefijo" class="col-md-4 col-form-label text-md-right">{{ __('Defina un Prefijo') }}</label>

                            <div class="col-md-6 row">
                                <input id="prefijo" type="text" class="col-md-8 form-control{{ $errors->has('prefijo') ? ' is-invalid' : '' }}" name="prefijo" value="{{ $documento->prefijo }}" required autofocus>

                                @if ($errors->has('prefijo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prefijo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6" align="left">
                                <a href="{{ route('documento.show' , $documento->id) }}" class="btn btn-danger">{{ __('Cancelar') }}</a>
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
