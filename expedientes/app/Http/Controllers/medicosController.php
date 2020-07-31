<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
class medicosController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $medicos = User::where("tipo","=","2")->get(); //Trae todos los registro de la bd
        return $medicos; //Regresa esos registros
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {   
        $user= new User(); //Crea un nuevo medicamento de la tabla
        //Recupera los datos del request
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->cedula = $request->cedula;
        $user->domicilio = $request->domicilio;
        $user->tipo = 2;
        $user->telefono = $request->telefono;
        $user->user = $request->user;
        $user->email=  $request->email;
        $user->password = Hash::make($request->password);
        $user->save(); //Guarda los datos
        return $user;
          
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
        $user = User::findOrFail($id); //Busca primero el user 
        //Obtiene los datos del request y actualiza los nuevos datos
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->cedula = $request->cedula;
        $user->domicilio = $request->domicilio;
        $user->tipo = 2;
        $user->telefono = $request->telefono;
        $user->user = $request->user;
        $user->email=  $request->email;
        if (Hash::needsRehash($request->password)) {
            $user->password = Hash::make($request->password);
        }else{
            $user->password=$request->password;
        }
        $user->save(); //Guarda los datos

        return $user;
    }
    ////////////SECRTEARIASSSS
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $medicos =  User::where("tipo","=","3")->get(); //Trae todos los registro de la bd
        return $medicos; //Regresa esos registros
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create2(Request $request)
    {   
        $user= new User(); //Crea un nuevo medicamento de la tabla
        //Recupera los datos del request
        /*$user->name = $data['name'];
        $user->apellidos = $data['apellidos'];
        $user->cedula = $data['cedula'];
        $user->domicilio = $data['domicilio'];
        $user->tipo = 3;
        $user->telefono = $data['telefono'];
        $user->user = $data['user'];
        $user->email=  $data['email'];
        $user->password = Hash::make($data['password']);*/
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->cedula = $request->cedula;
        $user->domicilio = $request->domicilio;
        $user->tipo = 3;
        $user->telefono = $request->telefono;
        $user->user = $request->user;
        $user->email=  $request->email;
        $user->password = Hash::make($request->password);
        $user->save(); //Guarda los datos
        return $user;
          
    }

    /**
     * Sirve para medicos y secretarias
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sec= User::findOrFail($id); //Busca el registro en la bd o falla
        return $sec;  //Regresa el padecimiento encontrado
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update2($id, Request $request)
    {
        
        $user = User::findOrFail($id); //Busca primero el user 
        //Obtiene los datos del request y actualiza los nuevos datos
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->cedula = $request->cedula;
        $user->domicilio = $request->domicilio;
        $user->tipo = 3;
        $user->telefono = $request->telefono;
        $user->user = $request->user;
        $user->email=  $request->email;
        if (Hash::needsRehash($request->password)) {
            $user->password = Hash::make($request->password);
        }else{
            $user->password=$request->password;
        }
        $user->save(); //Guarda los datos

        return $user;
    }

    //SIRVE PARA AMBOS YA ESTAN EN LA MISMA TABLA
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = User::find($id); //Busca el paciente a eliminar
        $medico->delete(); //Borra el paciente encontrado
        return $medico;
    }

}
