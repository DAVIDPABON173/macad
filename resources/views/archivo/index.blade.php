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
                        @for($i=0; $i< sizeof($archivos); $i++)
                        <tr>
                          <th scope="row">{{$i+1}}</th>
                          <td>{{ $archivos[$i]->id }}</td>
                          <td>{{ $archivos[$i]->documento->documento }}</td>
                          <td>{{ $archivos[$i]->documento->prefijo }}</td>
                          <td>{{ $archivos[$i]->referencia }}</td>
                          <td>{{ $archivos[$i]->nombre }}</td>
                          <td>{{ $archivos[$i]->anio }}</td>
                          <td>{{ $archivos[$i]->descripcion }}</td>
                          <td>{{ $archivos[$i]->ubicacion_fisica }}</td>
                          <td>{{ $archivos[$i]->created_at }}</td>
                          <td>{{ $archivos[$i]->updated_at }}</td>
                          <td><a type="button" class="btn btn-info" href="{{ route('archivo.show' , $archivos[$i]->id) }}">VER</a></td>
                          <td><a type="button" class="btn btn-info" href="{{ route('archivo.edit' , $archivos[$i]->id) }}">BORRAR</a></td>
                        </tr>
                        @endfor

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
