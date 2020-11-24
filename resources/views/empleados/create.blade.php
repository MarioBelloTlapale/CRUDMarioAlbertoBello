@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

@section('content')

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<div class="container">
<form action="{{url('/empleados')}}" method="post" enctype="multipart/formdata">
@csrf
    <label for"CodigoEmpleado">{{'CodigoEmpleado'}}</label>
    <input type="text" name="CodigoEmpleado" value="" id="CodigoEmpleado">
    </br>
    <label for"Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" value="" id="Nombre">
    </br>
    <label for"ApellidoPaterno">{{'ApellidoPaterno'}}</label>
    <input type="text" name="ApellidoPaterno" value="" id="ApellidoPaterno">
    </br>
    <label for"ApellidoMaterno">{{'ApellidoMaterno'}}</label>
    <input type="text" name="ApellidoMaterno" value="" id="ApellidoMaterno">
    </br>
    <label for"Puesto">{{'Puesto'}}</label>
    <input type="text" name="Puesto" value="" id="Puesto">
    </br>
    <label for"Sueldo">{{'Sueldo'}}</label>
    <input type="text" name="Sueldo" value="" id="Sueldo">
    </br>
    <label for"TipoMonedaSueldo">{{'TipoMonedaSueldo'}}</label>
    <input type="text" name="TipoMonedaSueldo" value="" id="TipoMonedaSueldo">
    </br>
    <label for"Correo">{{'Correo'}}</label>
    <input type="email" name="Correo" value="" id="Correo">
    </br>
    <label for"Activo">{{'Activo'}}</label>
    <input type="text" name="Activo" value="" id="Activo">
    </br>
    <label for"Eliminado">{{'Eliminado'}}</label>
    <input type="text" name="Eliminado" value="" id="Eliminado">
    </br>
    
    <input type="submit" value="Agregar" class="btn btn-primary">

    <a href="{{url('empleados')}}" class="btn btn-secondary"> Regresar </a>
</form>
</div>
@endsection