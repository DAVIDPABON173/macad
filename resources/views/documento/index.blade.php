@extends('layouts.app')

@section('content')
<div class="title-block">
    <div class="row">
      <div class="col-md-8">
      <h3 class="title">TIPOS DE DOCUMENTOS</h3>
      <p>En esta vista, podras optener información de los Documentos existentes en MACAD</p>
      </div>
      <div class="col-md-4">
        <form method="GET" action="{{ route('documento.create') }}">
            <button type="submit" class="col-md-auto btn btn-oval btn-primary float-right"> {{ __('NUEVO TIPO DOCUMENTO +') }}</button>
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
                            <th scope="col">CATEGORÍA</th>
                            <th scope="col">CREADO</th>
                            <th scope="col">DETALLES</th>
                            <th scope="col">ARCHIVOS</th>
                            <th scope="col">BORRAR</th>
                          </tr>
                        </thead>
                        <tbody align="center">
                          <?php $i=1; ?>
                          @foreach($documentos as $documento)
                          <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{ $documento->documento }}</td>
                            <td>{{ $documento->prefijo }}</td>
                            <td>{{ $documento->categoria->categoria }}</td>
                            <td>{{ $documento->created_at->format('d-m-Y') }}</td>
                            <td>  
                              <form method="GET" action="{{ route('documento.show' , $documento->id) }}" name="show_form">
                                  <button type="submit" class="btn btn-oval btn-info"> {{ __('VER') }}</button>                            
                                  {{ csrf_field() }}
                              </form>
                            </td>
                            <td>  
                              <form method="GET" action="{{ route('documento.misArchivos' , $documento->id) }}" name="show_form">
                                  <button type="submit" id="files" class="btn btn-oval btn-primary"> {{ __('LISTAR ARCHIVOS') }}</button>                            
                                  {{ csrf_field() }}
                              </form>
                            </td>
                            <td align="center">  
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-oval btn-danger" data-toggle="modal" data-target="#example-{{ $documento->id }}">
                                <i class="fas fa-trash-alt"></i>
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="example-{{ $documento->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                      <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-exclamation-triangle"></i> Advertencia</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body" align="left">
                                      ¿Está seguro de querer eliminar <strong>Tipo de Documento: {{ $documento->documento }}</strong>?. <br>*IMPORTANTE* Al eliminar el Tipo de Documento, <strong>TODOS</strong> sus archivos también serán eliminados.
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-oval btn-secondary" data-dismiss="modal">Cancelar</button>
                                      <form method="POST" action="{{ route('documento.destroy' , $documento) }}" name="delete_form">
                                          <button type="submit" class="btn btn-oval btn-danger">
                                            Borrar
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
                        {{ $documentos->links() }}
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
