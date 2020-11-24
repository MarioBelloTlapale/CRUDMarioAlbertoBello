@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

@section('content')

<div class="container">

<form action="{{ url('/empleados/'.$empleado->CodigoEmpleado) }}" method="post" >
@csrf
{{ method_field('PATCH') }}

    <label for"CodigoEmpleado">{{'CodigoEmpleado'}}</label>
    <input type="text" name="CodigoEmpleado" value="{{$empleado->CodigoEmpleado}}" id="CodigoEmpleado">
    </br>
    <label for"Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" value="{{$empleado->Nombre}}" id="Nombre">
    </br>
    <label for"ApellidoPaterno">{{'ApellidoPaterno'}}</label>
    <input type="text" name="ApellidoPaterno" value="{{$empleado->ApellidoPaterno}}" id="ApellidoPaterno">
    </br>
    <label for"ApellidoMaterno">{{'ApellidoMaterno'}}</label>
    <input type="text" name="ApellidoMaterno" value="{{$empleado->ApellidoMaterno}}" id="ApellidoMaterno">
    </br>
    <label for"Puesto">{{'Puesto'}}</label>
    <input type="text" name="Puesto" value="{{$empleado->Puesto}}" id="Puesto">
    </br>
    <label for"Sueldo">{{'Sueldo'}}</label>
    <input type="text" name="Sueldo" value="{{$empleado->Sueldo}}" id="Sueldo">
    </br>
    <label for"TipoMonedaSueldo">{{'TipoMonedaSueldo'}}</label>
    <input type="text" name="TipoMonedaSueldo" value="{{$empleado->TipoMonedaSueldo}}" id="TipoMonedaSueldo">
    </br>
    <label for"Correo">{{'Correo'}}</label>
    <input type="email" name="Correo" value="{{$empleado->Correo}}" id="Correo">
    </br>
    <label for"Activo">{{'Activo'}}</label>
    <input type="text" name="Activo" value="{{$empleado->Activo}}" id="Activo">
    </br>
    <label for"Eliminado">{{'Eliminado'}}</label>
    <input type="text" name="Eliminado" value="{{$empleado->Eliminado}}" id="Eliminado">
    </br>
    
    <input type="submit" value="Guardar edición" class="btn btn-primary">

    <a href="{{url('empleados')}}" class="btn btn-secondary"> Regresar </a>
</form>
</div>
@endsection