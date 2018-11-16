@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
          <h3 class="title">{{ __('BUSCAR ARCHIVO') }}</h3>
          <p>{{ __('A continuación, seleccione un atributo de busqueda e ingrese un valor a buscar.') }}</p>
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
                    <form method="POST" action="{{ route('archivo.showArchivosFind') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="elemento" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione un atributo de busqueda') }}</label>

                            <div class="dropdown col-md-6" >
                                <select id="atributo" name="atributo" class="form-control">
                                    <option value="null" selected>Atributos</option>
                                    <option value="1" >{{ __('NOMBRE DE ARCHIVO') }}</option>
                                    <option value="2" >{{ __('REFERENCIA') }}</option>
                                    <option value="3" >{{ __('FECHA') }}</option>
                                    <option value="4" >{{ __('AÑO') }}</option>
                                    <option value="5" >{{ __('DESCRIPCIÓN') }}</option>
                                    <option value="6" >{{ __('UBICACIÓN FÍSICA') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor-buscar" class="col-md-4 col-form-label text-md-right">{{ __('Valor a buscar') }}</label>

                            <div class="col-md-4">
                                <input id="valor" type="text" class="form-control{{ $errors->has('valor') ? ' is-invalid' : '' }}" name="valor" required autofocus>

                                @if ($errors->has('valor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('valor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        
                        
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right">
                                    {{ __('Buscar') }}
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

