@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDITAR CATEGORIA') }}</div>

                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                            <strong>{{ __('*IMPORTANTE* ´Sí modifica los datos de una categoría, los cambios de veran reflejados en todos los archivos registrados que se relacionan con este.') }}</strong>
                    </div>
                    
                    <form method="POST" action="{{ route('categoria.update' , $categoria->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6" align="left">
                                <a href="{{ route('categoria.show' , $categoria->id) }}" class="btn btn-danger">{{ __('Cancelar') }}</a>
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
