@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header" align="center"><strong>TIPOS DE DOCUMENTOS</strong></div>
                    <p><strong>En esta vista, podras optener información de los Documentos existentes en MACAD</strong></p>
                    <table class="table table-striped" align="center">
                      <thead align="center">
                        <tr >
                          <th scope="col">#</th>
                          <th scope="col">ID</th>
                          <th scope="col">TIPO DOCUMENTO</th>
                          <th scope="col">PREFIJO</th>
                          <th scope="col">CATEGORIA</th>
                          <th scope="col">CREADO</th>
                          <th scope="col">MODIFICADO</th>
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
                          <td>{{ $documento->id }}</td>
                          <td>{{ $documento->documento }}</td>
                          <td>{{ $documento->prefijo }}</td>
                          <td>{{ $documento->categoria->categoria }}</td>
                          <td>{{ $documento->created_at }}</td>
                          <td>{{ $documento->updated_at }}</td>
                          <td>  
                            <form method="GET" action="{{ route('documento.show' , $documento->id) }}" name="show_form">
                                <button type="submit" class="btn btn-oval btn-info"> {{ __('VER') }}</button>                            
                                {{ csrf_field() }}
                            </form>
                          </td>
                          <td>  
                            <form method="GET" action="{{ route('documento.misArchivos' , $documento->id) }}" name="show_form">
                                <button type="submit" class="btn btn-oval btn-primary"> {{ __('VER ARCHIVOS') }}</button>                            
                                {{ csrf_field() }}
                            </form>
                          </td>
                          <td align="center">  
                            <form method="POST" action="{{ route('documento.destroy' , $documento) }}" name="delete_form">
                                <button type="submit" class="btn btn-oval btn-danger">{{ __('x') }}</button>
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
