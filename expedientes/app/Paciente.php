<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $fillable = [
        'nombre','apellidos', 'domicilio', 'fecha_nacimiento'. 'telefono','email',
    ];
}
