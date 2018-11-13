@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
      <h3 class="title">{{ __('EDITAR CATEGORÍA') }}</h3>
      <p> <strong>{{ __('*IMPORTANTE*') }}</strong> {{__('Al modificar los datos de una categoría, los cambios se verán reflejados en todos los archivos registrados que se relacionan con este.') }}</strong></p>
      </div>
      <div class="col-md-4" align="right">
            <form method="GET" action="{{ route('categoria.index') }}">
                <button type="submit" class="btn btn-oval btn-primary"> {{ __('IR A LA LISTA DE CATEGORÍAS') }}</button>
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
                    <form method="POST" action="{{ route('categoria.show' , $categoria->id) }}">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Categoria') }}</label>

                            <div class="col-md-6">
                                <input id="categoria" type="text" class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" name="categoria" value="{{ $categoria->categoria }}" required autofocus>

                                @if ($errors->has('categoria'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categoria') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">                                
                                <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" name="descripcion" rows="3" required autofocus>{{ $categoria->descripcion }}</textarea>
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6" align="left">
                                <a href="{{ route('categoria.show' , $categoria->id) }}" class="btn btn-oval btn-danger">{{ __('Cancelar') }}</a>
                            </div>
                            <div class="col-md-6" align="right">
                                <button type="submit" class="btn btn-oval btn-primary">
                                    {{ __('Actualizar') }}
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
