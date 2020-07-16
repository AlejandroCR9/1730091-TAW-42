<?php

use Illuminate\Database\Seeder;
use App\User;
class UsuariosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' 				=>	'Admin',
        	'apellidos'				=>	'Admin',
            'user'			=>	'Admin',
            'domicilio'			=>	'Admin',
            'password'			=>Hash::make('12345678'),
            'cedula'			=>	'Admin',
            'domicilio'			=>	'Admin',
            'telefono'			=>	'Admin',
            'email'			=>	'admin@admin.com',
        ]);
    }
}
