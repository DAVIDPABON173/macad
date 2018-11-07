@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">LISTA DE CATEGORIAS MACAD</div>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">ID</th>
                          <th scope="col">NOMBRE CATEGORIA</th>
                          <th scope="col">DESCRIPCION</th>
                          <th scope="col">CREADO</th>
                          <th scope="col">MODIFICADO</th>
                          <th scope="col">DETALLES</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; ?>
                        @foreach($categorias as $categoria)
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{ $categoria->id }}</td>
                          <td>{{ $categoria->categoria }}</td>
                          <td>{{ $categoria->descripcion }}</td>
                          <td>{{ $categoria->created_at }}</td>
                          <td>{{ $categoria->updated_at }}</td>
                          <td>  
                            <form method="GET" action="{{ route('categoria.show' , $categoria->id) }}" name="show_form">
                                <button type="submit" class="btn btn-info"> {{ __('VER') }}</button>                            
                                {{ csrf_field() }}
                            </form>
                          </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach

                      </tbody>
                      {{ $categorias->links() }}
                    </table>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

