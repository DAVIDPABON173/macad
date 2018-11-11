@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('DETALLES DE TIPO DOCUMENTO') }}</div>

                <div class="card-body">
                   
                    <form method="GET" action="{{ route('documento.edit' , $documento->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-4" >
                                <select name="categoria_id" id="categoria_id" class="form-control dropdown-toggle"  disabled readonly="readonly">
                                    <option value="{{ $documento->categoria_id }}">{{ $documento->categoria->categoria }}</option>
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

                            <div class="col-md-6 row">
                                <input id="documento" type="text" class="col-md-8 form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" value="{{ $documento->documento }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefijo" class="col-md-4 col-form-label text-md-right">{{ __('Defina un Prefijo') }}</label>

                            <div class="col-md-6 row">
                                <input id="prefijo" type="text" class="col-md-8 form-control{{ $errors->has('prefijo') ? ' is-invalid' : '' }}" name="prefijo"value="{{ $documento->prefijo }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6" align="left">
                                <a href="{{ route('documento.index') }}" class="btn btn-success">{{ __('Atras') }}</a>
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
