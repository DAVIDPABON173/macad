@extends('layouts.app')

@section('content')

<div class="title-block">
    <div>
      <h3 class="title">LISTA DE ARCHIVOS</h3>
      <p>En esta vista, podras optener información sobre los archivos cargados en MACAD</p>
    </div>
    <div class="alert alert-warning" align="center">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        asdfgfdsdfdsdfdsdsdds asdfgfdsdfdsdfdsdsdds asdfgfdsdfdsdfdsdsdds asdfgfdsdfdsdfdsdsdds
    </div>
</div>
<section class="section">
  <div class="row sameheight-container">
      <div class="col-md-12">
          <div class="card sameheight-item">
              <div class="card-block">
                  <section class="section">
                    <table class="table-responsive table-striped">
                      <thead  align="center">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">TIPO DOCUMENTO</th>
                          <th scope="col">PREFIJO</th>
                          <th scope="col">REFERENCIA</th>
                          <th scope="col">NOMBRE ARCHIVO</th>
                          <th scope="col">AÑO</th>
                          <th scope="col">UBICACION</th>
                          <th scope="col">REGISTRADO</th>
                          <th scope="col">VER</th>
                          <th scope="col">BORRAR</th>
                        </tr>
                      </thead>
                      <tbody  align="center"> 
                        <?php $i=1; ?>
                        @foreach($archivos as $archivo)
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{ $archivo->documento->documento }}</td>
                          <td>{{ $archivo->documento->prefijo }}</td>
                          <td>{{ $archivo->referencia }}</td>
                          <td>{{ $archivo->nombre }}</td>
                          <td>{{ $archivo->anio }}</td>
                          <td>{{ $archivo->ubicacion_fisica }}</td>
                          <td>{{ $archivo->created_at }}</td>
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


@section('foot')  
@endsection
