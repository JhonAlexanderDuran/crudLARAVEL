@extends('plantilla')

@section('content')
<div class="row">
    <div class="col-md-7">
        <table class="table">
            <tr>
               
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
            @foreach ($notas as $item)
                <tr> 
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->descripcion}}</td>
                    <td>
                        <a href="{{route('editar' , $item->id)}}" class="btn btn-warning">Editar</a>
                        <form action="{{route('eliminar' , $item->id)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        @if (session('eliminar'))
            <div class="alert alert-success mt-3">
            {{session('eliminar')}}
        </div> 
        @endif
    </div>
    {{--Fila formulario--}}
    <div class="col-md-5">
        <h3 class="text-center mb-4">Agregar notas</h3>

        <form action="{{route('store')}}" method="POST">
            @csrf

            <div class="form-goup">
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de la nota" required>
            <br>
            </div>

            <div class="form-goup">
                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion de la nota" required>
            <br>
            </div>

            <button type="submit" class="btn btn-success btn-block"> Enviar nota </button>
        </form>
            @if (session('agregar'))  
            <div class="alert alert-success mt-3">
                {{session('agregar')}}
            </div>
                
            @endif
    </div>
    {{--fin fila formulario--}}
</div>    

@endsection