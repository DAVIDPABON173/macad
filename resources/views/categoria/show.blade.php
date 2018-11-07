@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('INFORMACIÓN DE CATEGORÍA') }}</div>

                <div class="card-body">

                    <div class="alert alert-info" role="alert">
                            <strong>{{ __('A continuación, se presenta informacion básica de la categoría seleccionada') }}</strong>
                    </div>

                    <form method="GET" action="{{ route('categoria.edit' , $categoria->id) }}"
                    enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Categoria') }}</label>

                            <div class="col-md-6">
                                <input id="categoria" type="text" class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" name="categoria" value="{{ $categoria->categoria }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">                                
                                <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" name="descripcion" rows="3">{{ $categoria->descripcion }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6" align="left">
                                <a href="{{ route('categoria.index') }}" class="btn btn-success">{{ __('Atras') }}</a>
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
