<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use BD;
class empleadosController extends Controller{
    //
    public function index(){
        //obtener todos los empleados de latabla de la bd
        $empleados=Empleado::all();
        //MOstrar vista de la consulta de empleados
        return view('empleados.admin_empleado',compact('empleados'));
    }

    //Controaldor para crear nuevo empleado
    public function create(){
        //Mostrar el formulario para crear empleado
        return view('empleados.alta_empleado');
    }

    public function store(Request $request){
        //Retirar los datos del request
        $datosEmpleados=request()->except('empleado');

        //instertar en la tabla empleado los datos para la creación de un nuevo registro
        $id=DB::table('empleados')->insertGetId($datosEmpleado);
        Alert::success('Datos guardados con exito');
        return redirect('empleados');
    }

    //Controlador para editar 
    public function edit($id){
        $empleados=Empleado::findOrFail($id);
        //Mostrar la vista
        return view('empleados.editar_empleado',compact('empleado'));
    }

    //Controlador para eliminar empleado
    public function destroy($id){
        Alert::success('Datos eliminados de la base de datos');
        return redirect('empleados');
    }
}
