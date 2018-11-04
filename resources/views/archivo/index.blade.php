@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">LISTA DE ARCHIVOS CARGADOS EN MACAD</div>

                    <table class="table table-striped">
                      <thead>
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
                      <tbody>
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
                            <button type="submit" class="btn btn-info" onclick="show()" > {{ __('VER') }}
                            </button>
                          </td>
                          <td>  
                            <button type="submit" class="btn btn-danger" onclick="send_delete()"> {{ __('ELIMINAR') }}
                            </button>
                          </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach

                      </tbody>
                      {{ $archivos->links() }}
                    </table>
                    <form method="POST" action="{{ route('archivo.destroy' , $archivo) }}" name="delete_form">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>

                    <form method="GET" action="{{ route('archivo.show' , $archivo->id) }}" name="show_form">
                      {{ csrf_field() }}
                    </form>

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
  <script>
    function send_delete()
    {
      document.delete_form.submit(); 
    }
  </script>

  <script>
    function show()
    {
      document.show_form.submit(); 
    }
  </script>
@endsection
