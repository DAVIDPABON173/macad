@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
      <h3 class="title">LISTA DE CATEGORIAS</h3>
      <p>En esta vista, podras obtener información las categorias existentes en MACAD</p>
      </div>
      <div class="col-md-4" align="right">
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
                    <table class="table table-responsive table-bordered">
                      <thead  align="center">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">CATEGORIA</th>
                          <th scope="col">DESCRIPCION</th>
                          <th scope="col">CREADO</th>
                          <th scope="col">DETALLES</th>
                          <th scope="col">TIPOS DOCUMENTO</th>
                        </tr>
                      </thead>
                      <tbody  align="center">
                        <?php $i=1; ?>
                        @foreach($categorias as $categoria)
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{ $categoria->categoria }}</td>
                          <td>{{ $categoria->descripcion }}</td>
                          <td>{{ $categoria->created_at->format('d-m-Y') }}</td>
                          <td>  
                            <form method="GET" action="{{ route('categoria.show' , $categoria->id) }}">
                                <button type="submit" class="btn btn-oval btn-info"> {{ __('VER') }}</button>
                                {{ csrf_field() }}
                            </form>
                          </td>
                          <td>  
                            <form method="GET" action="{{ route('categoria.misDocumentos' , $categoria->id) }}" name="show_form">
                                <button type="submit" class="btn btn-oval btn-primary"> {{ __('LISTAR TIPOS') }}</button>
                                {{ csrf_field() }}
                            </form>
                          </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach

                      </tbody>
                      {{ $categorias->links() }}
                    </table>
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

