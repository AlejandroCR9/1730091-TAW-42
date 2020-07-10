<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    protected $table = 'alergias';
    protected $fillable = [
        'nombre','descripcion'
    ];
}
