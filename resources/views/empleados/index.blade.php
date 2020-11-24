@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<div class="container">

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

</br>
</br>
<a href="{{url('/empleados/create')}}" class="btn btn-success"> Agregar empleado </a>
</br>
</br>
<table class="table table-light">

    <thead>
        <tr>
            <th>CodigoEmpleado</th>
            <th>Nombre</th>
            <th>ApellidoPaterno</th>
            <th>ApellidoMaterno</th>
            <th>Puesto</th>
            <th>Sueldo</th>
            <th>TipoMoneda</th>
            <th>Correo</th>
            <th>Activo</th>
            <th>Eliminado</th>
            <th>Accion</th>
        </tr>
    </thead>

    <tbody>
        @foreach($empleados as $empleado)
            <tr>
                
                <td> {{$empleado->CodigoEmpleado}} </td>
                <td> {{$empleado->Nombre}} </td>
                <td> {{$empleado->ApellidoPaterno}} </td>
                <td> {{$empleado->ApellidoMaterno}} </td>
                <td> {{$empleado->Puesto}} </td>
                <td> {{$empleado->Sueldo}} </td>
                <td> {{$empleado->TipoMonedaSueldo}} </td>
                <td> {{$empleado->Correo}} </td>
                <td> {{$empleado->Activo}} </td>
                <td> {{$empleado->Eliminado}} </td>
                <td> 
                    <a href={{ url('/empleados/'.$empleado->CodigoEmpleado.'/edit') }} class="btn btn-primary"> Editar </a>
                    </br>
                    <form method="post" action={{ url('/empleados/'.$empleado->CodigoEmpleado) }}>
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('¿Borrar?');" class="btn btn-danger"> Eliminar </button>
                    </form>                
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
