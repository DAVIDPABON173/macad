@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">CONFIGURACIÓN: LISTA DE DOCUMENTOS-CATEGORIAS CARGADOS EN MACAD</div>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">ID</th>
                          <th scope="col">TIPO DOCUMENTO</th>
                          <th scope="col">PREFIJO</th>
                          <th scope="col">CATEGORIA</th>
                          <th scope="col">CREADO</th>
                          <th scope="col">MODIFICADO</th>
                          <th scope="col">MIS DOCUMENTOS</th>
                          <th scope="col">DETALLES</th>
                          <th scope="col">BORRAR</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; ?>
                        @foreach($documentos as $documento)
                        <tr>
                          <th scope="row">{{$i}}</th>
                          <td>{{ $documento->id }}</td>
                          <td>{{ $documento->documento }}</td>
                          <td>{{ $documento->prefijo }}</td>
                          <td>{{ $documento->categoria->categoria }}</td>
                          <td>{{ $documento->created_at }}</td>
                          <td>{{ $documento->updated_at }}</td>
                          <td>  
                            <form method="GET" action="{{ route('documento.show' , $documento->id) }}" name="show_form">
                                <button type="submit" class="btn btn-success"> {{ __('MIS DOCUMENTOS') }}</button>                            
                                {{ csrf_field() }}
                            </form>
                          </td>
                          <td>  
                            <form method="GET" action="{{ route('documento.show' , $documento->id) }}" name="show_form">
                                <button type="submit" class="btn btn-info"> {{ __('DETALLES') }}</button>                            
                                {{ csrf_field() }}
                            </form>
                          </td>
                          <td>  
                            <form method="POST" action="{{ route('documento.destroy' , $documento) }}" name="delete_form">
                                <button type="submit" class="btn btn-danger">{{ __('ELIMINAR') }}</button>
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
