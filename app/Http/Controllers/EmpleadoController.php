<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $datos['empleados']=Empleado::paginate(5);
        return view('empleados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //$datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token');
        $respuesta = $this->compruebaCampos($datosEmpleado);
        if($respuesta == true) {
            Empleado::insert($datosEmpleado);
            return redirect('empleados')->with('Mensaje','Empleado agregado con éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $empleado = Empleado::where('CodigoEmpleado', $id)->first();
        return view('empleados.edit', ['empleado'=>$empleado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $datosEmpleado = request()->except(['_token','_method']);       
        $respuesta = $this->compruebaCampos($datosEmpleado);
        if($respuesta == true) {
            Empleado::where('CodigoEmpleado','=', $id)->update($datosEmpleado);
            return redirect('empleados')->with('Mensaje','Empleado actualizado con éxito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Empleado::destroy($id);
        return redirect('empleados')->with('Mensaje','Empleado eliminado con éxito');
    }

    public function comprobarCadena($cadena) {
        if(!preg_match("/^[a-zA-Z]+$/", $cadena)){
            return false;
        }
        else {
            return true;
        }
    }

    public function compruebaCorreo($correo) {
        if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $correo)){
            return false;
        }
        else {
            return true;
        }
    }

    public function compruebaSalario($salario){
        if(is_numeric($salario)){
            if($salario > 0) {
                return true;
            }
            if($salario <= 0) {
                echo 'El campo salario debe ser mayor a cero';
                return false;
            }
        }
        else {
            echo 'El campo salario debe ser un número';
            return false;
        }
    }

    public function compruebaCampos($datosEmpleado) {
        $nombre = $datosEmpleado['Nombre'];
        $respuesta = $this->comprobarCadena($nombre);
        if($respuesta == true) {
            $apellidoP = $datosEmpleado['ApellidoPaterno'];
            $respuesta = $this->comprobarCadena($apellidoP);
            if($respuesta==true) {
                $apellidoM = $datosEmpleado['ApellidoMaterno'];
                $respuesta = $this->comprobarCadena($apellidoM);
                if($respuesta==true) {
                    $correo = $datosEmpleado['Correo'];
                    $respuesta = $this->compruebaCorreo($correo);
                    if($respuesta==true){
                        $salario = $datosEmpleado['Sueldo'];
                        $respuesta = $this->compruebaSalario($salario);
                        if($respuesta == true) {
                            return true;
                        }
                        else {
                            return false;
                        }
                    }
                    else {
                        echo 'El correo electrónico no es válido';
                        return false;
                    }
                }
                else {
                    echo 'El apellido materno no es válido';
                    return false;
                }
            }
            else {
                echo 'El apellido paterno no es válido';
                return false;
            }
        }
        else {
            echo 'El nombre no es válido';
            return false;
        }
    }
}
