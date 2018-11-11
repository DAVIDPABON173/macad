@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header" align="center"><strong>LISTA DE ARCHIVOS</strong></div>
                    <p><strong>En esta vista, podras optener información sobre los archivos cargados en MACAD</strong></p>
                    <table class="table table-striped">
                      <thead  align="center">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">ID</th>
                          <th scope="col">TIPO DOCUMENTO</th>
                          <th scope="col">PREFIJO</th>
                          <th scope="col">REFERENCIA</th>
                          <th scope="col">NOMBRE</th>
                          <th scope="col">AÑO</th>
                          <th scope="col">DESCRIPCIÓN</th>
                          <th scope="col">UBICACION</th>
                          <th scope="col">CREADO</th>
                          <th scope="col">MODIFICADO</th>
                          <th scope="col">VER</th>
                          <th scope="col">BORRAR</th>
                        </tr>
                      </thead>
                      <tbody  align="center"> 
                        <?php $i=1; ?>
                        @foreach($archivos as $archivo)
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{ $archivo->id }}</td>
                          <td>{{ $archivo->documento->documento }}</td>
                          <td>{{ $archivo->documento->prefijo }}</td>
                          <td>{{ $archivo->referencia }}</td>
                          <td>{{ $archivo->nombre }}</td>
                          <td>{{ $archivo->anio }}</td>
                          <td>{{ $archivo->descripcion }}</td>
                          <td>{{ $archivo->ubicacion_fisica }}</td>
                          <td>{{ $archivo->created_at }}</td>
                          <td>{{ $archivo->updated_at }}</td>
                          <td>  
                            <form method="GET" action="{{ route('archivo.show' , $archivo->id) }}" name="show_form">
                                <button type="submit" class="btn btn-oval btn-info"> {{ __('VER') }}</button>                            
                                {{ csrf_field() }}
                            </form>
                          </td>
                          <td>  
                            <form method="POST" action="{{ route('archivo.destroy' , $archivo) }}" name="delete_form">
                                <button type="submit" class="btn btn-oval btn-danger">{{ __('X') }}</button>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                          </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach

                      </tbody>
                      {{ $archivos->links() }}
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


@section('foot')  
@endsection
