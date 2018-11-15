@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
      <h3 class="title">{{ __('REGISTRAR CATEGORÍA') }}</h3>
      <p>{{ __('A continuación, ingrese los datos básicos para la creación de una categoría.') }}</p>
      </div>
      <div class="col-md-4">
            <form method="GET" action="{{ route('categoria.index') }}">
                <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right"> {{ __('IR A LA LISTA DE CATEGORÍAS') }}</button>
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
                    <form method="POST" action="{{ route('categoria.store') }}">
                        @csrf
                        
                        <p>A continuación, se presenta el formulario, para la creación de una nueva categoría.</p>
                        
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Categoría') }}</label>

                            <div class="col-md-6">
                                <input id="categoria" type="text" class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" name="categoria" value="{{ old('categoria') }}" required autofocus>

                                @if ($errors->has('categoria'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categoria') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">                                
                                <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" name="descripcion" rows="3" required autofocus></textarea>
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right">
                                    {{ __('Registrar Categoría') }}
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
