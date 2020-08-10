<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpedienteComentario extends Model
{
    protected $table = 'expedientecomentarios';
    protected $fillable = [
        'idExpediente','idMedico','comentario'
    ];
}
