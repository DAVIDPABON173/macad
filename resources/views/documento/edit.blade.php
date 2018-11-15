@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
      <h3 class="title">{{ __('EDITAR TIPO DOCUMENTO') }}</h3>
      <p>En esta vista, podrás modificar los datos de un tipo de documento. Una vez realizada la modificación, guarda las cambios dando clic en <strong>"Actualizar"</strong></p>
      </div>
      <div class="col-md-4">
            <form method="GET" action="{{ route('documento.misArchivos' , $documento->id) }}">
                <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right"> {{ __('LISTAR ARCHIVOS') }}</button>
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
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Documento') }}</label>

                            <div class="col-md-4">
                                <input id="documento" type="text" class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}" name="documento" value="{{ ($documento->documento) }}" required autofocus>

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
                                <input id="prefijo" type="text" class="form-control{{ $errors->has('prefijo') ? ' is-invalid' : '' }}" name="prefijo" value="{{ $documento->prefijo }}" required autofocus>

                                @if ($errors->has('prefijo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prefijo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-6" align="left">
                                <a href="{{ route('documento.show' , $documento->id) }}" class="btn btn-oval btn-danger">{{ __('Cancelar') }}</a>
                            </div>
                            <div class="col-6" align="right">
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
