@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('REGISTRAR TIPO DOCUMENTO') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('documento.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="informacion" class="col-md-12 col-form-label text-md-center">
                                <strong>{{ __('Por favor, complete los campos que se presentan a continuación y verifique la categoría en donde creará el nuevo tipo de documento.') }}</strong>
                            </label>
                        </div>

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-4" >
                                <select name="categoria_id" id="categoria_id" class="form-control dropdown-toggle"  required autofocus>
                                    <option value="">-- Seleccione un categoría --</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

                            <div class="col-md-6 row">
                                <input id="documento" type="text" class="col-md-8 form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" value="{{ old('documento') }}" required autofocus>

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
                                <input id="prefijo" type="text" class="col-md-8 form-control{{ $errors->has('prefijo') ? ' is-invalid' : '' }}" name="prefijo" value="{{ old('prefijo') }}" required autofocus>

                                @if ($errors->has('prefijo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prefijo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar Tipo Documento') }}
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
