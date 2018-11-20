@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
      <h3 class="title">LISTA DE ARCHIVOS</h3>
      <p>En esta vista, podras optener información sobre los archivos cargados en MACAD</p>
      </div>
      <div class="col-md-2">
        <form method="GET" action="{{ route('archivo.find') }}">
            <button type="submit" class="btn btn-oval btn-info col-md-auto float-right"><i class="fas fa-search"></i> {{ __('BUSCAR') }}</button>
            
            {{ csrf_field() }}
        </form>
      </div>
      <div class="col-md-2">
        <form method="GET" action="{{ route('archivo.create') }}">
            <button type="submit" class="btn btn-oval btn-primary col-md-auto float-right"> {{ __('NUEVO +') }}</button>
            
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
                    <table class="table table-responsive-lg table-striped">
                      <thead align="center">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">TIPO DOCUMENTO</th>
                          <th scope="col">PREFIJO</th>
                          <th scope="col">REFERENCIA</th>
                          <th scope="col">NOMBRE ARCHIVO</th>
                          <th scope="col">AÑO</th>
                          <th scope="col">UBICACIÓN</th>
                          <th scope="col">REGISTRADO</th>
                          <th scope="col">VER</th>
                          <th scope="col">BORRAR</th>
                        </tr>
                      </thead>
                      <tbody align="center"> 
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
                          <td>{{ $archivo->created_at->format('d-m-Y') }}</td>
                          <td>  
                            <form method="GET" action="{{ route('archivo.show' , $archivo->id) }}" name="show_form">
                                <button type="submit" class="btn btn-oval btn-info"> 
                                  {{ __('VER') }}
                                </button>                            
                                {{ csrf_field() }}
                            </form>
                          </td>
                          <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-oval btn-danger" data-toggle="modal" data-target="#example-{{ $archivo->id }}">
                              <i class="fas fa-trash-alt"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="example-{{ $archivo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header bg-warning">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle"></i> Advertencia</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    ¿Está seguro de querer eliminar el archivo: <strong>{{ $archivo->nombre }}</strong> ?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-oval btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form method="POST" action="{{ route('archivo.destroy' , $archivo) }}" name="delete_form">
                                        <button type="submit" class="btn btn-oval btn-danger">Borrar
                                        </button>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>  
                            
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
