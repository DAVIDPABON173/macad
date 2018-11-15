@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
      <h3 class="title">{{ __('DETALLES DE TIPO DOCUMENTO') }}</h3>
      <p>{{ __('A continuación se presenta información sobre el tipo de documento perteneciente a la categoria') }} {{$documento->categoria->categoria}}</p>
      </div>
      <div class="col-md-4">
        <form method="GET" action="{{ route('documento.misArchivos' , $documento->id) }}">
            <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right"> {{ __('LISTAR ARCHIVOS') }}</button>
            {{ csrf_field() }}
        </form>
        <form method="GET" action="{{ route('documento.create') }}">
            <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right"> {{ __('NUEVO TIPO DOC +') }}</button>
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
                    <form method="GET" action="{{ route('documento.edit' , $documento->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-4">
                                <select name="categoria_id" id="categoria_id" class="form-control dropdown-toggle"  disabled readonly="readonly">
                                    <option value="{{ $documento->categoria_id }}">{{ $documento->categoria->categoria }}</option>
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

                            <div class="col-md-4">
                                <input id="documento" type="text" class=" form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" value="{{ $documento->documento }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefijo" class="col-md-4 col-form-label text-md-right">{{ __('Defina un Prefijo') }}</label>

                            <div class="col-md-4">
                                <input id="prefijo" type="text" class=" form-control{{ $errors->has('prefijo') ? ' is-invalid' : '' }}" name="prefijo"value="{{ $documento->prefijo }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-6" align="left">
                                <a href="{{ route('documento.index') }}" class="btn btn-oval btn-danger">{{ __('Atras') }}</a>
                            </div>
                            <div class="col-6" align="right">
                                <button type="submit" class="btn btn-oval btn-primary">
                                    {{ __('Editar') }}
                                </button>
                                    
                            </div>
                        </div>
                    </form>
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
