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
                              <form method="POST" action="{{ route('documento.destroy' , $documento) }}" name="delete_form">
                                  <button type="submit" class="btn btn-oval btn-danger"><i class="fas fa-trash-alt"></i></button>
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                              </form>
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
