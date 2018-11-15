@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
      <h3 class="title">{{ __('REGISTRAR TIPO DE DOCUMENTO') }}</h3>
      <p>{{ __('Por medio de esta vista, crearemos un nuevo tipo de documento y lo asociaremos a una categoría. Por favor, complete los campos que se presentan a continuación y verifique la categoría en donde creará el nuevo tipo de documento.') }}</p>
      </div>
      <div class="col-md-4" align="right">
            <form method="GET" action="{{ route('documento.index') }}">
                <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right"> {{ __('IR A LA LISTA DE DOCUMENTOS') }}</button>
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
                    <form method="POST" action="{{ route('documento.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-4">
                                <select name="categoria_id" id="categoria_id" class="form-control dropdown-toggle"  required autofocus>
                                    <option value="">-- Seleccione un categoría --</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Documento') }}</label>
                            <div class="col-md-4">
                                <input id="documento" type="text" class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" value="{{ old('documento') }}" required autofocus>

                                @if ($errors->has('documento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefijo" class="col-md-4 col-form-label text-md-right">{{ __('Defina un Prefijo') }}</label>

                            <div class="col-md-4">
                                <input id="prefijo" type="text" class="form-control{{ $errors->has('prefijo') ? ' is-invalid' : '' }}" name="prefijo" value="{{ old('prefijo') }}" required autofocus>

                                @if ($errors->has('prefijo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prefijo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right">
                                    {{ __('Registrar Tipo Documento') }}
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
