@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
      <h3 class="title">{{ __('INFORMACIÓN DE CATEGORÍA') }}</h3>
      <p>A continuación se presenta información sobre la categoría cargado en MACAD</p>
      </div>
      <div class="col-md-4" align="right">
        <form method="GET" action="{{ route('categoria.misDocumentos' , $categoria->id) }}">
            <button type="submit" class="btn btn-oval btn-primary"> {{ __('LISTAR MIS TIPOS DOC') }}</button>
            {{ csrf_field() }}
        </form>
        <form method="GET" action="{{ route('categoria.create') }}">
        <button type="submit" class="btn btn-oval btn-primary"> {{ __('NUEVA CATEGORÍA +') }}</button>
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
                    <form method="GET" action="{{ route('categoria.edit' , $categoria->id) }}"
                    enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Categoria') }}</label>

                            <div class="col-md-6">
                                <input id="categoria" type="text" class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" name="categoria" value="{{ $categoria->categoria }}" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">                                
                                <textarea class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="descripcion" name="descripcion" rows="3" readonly="readonly">{{ $categoria->descripcion }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6" align="left">
                                <a href="{{ route('categoria.index') }}" class="btn btn-oval btn-danger">{{ __('Atras') }}</a>
                            </div>
                            <div class="col-md-6" align="right">
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
