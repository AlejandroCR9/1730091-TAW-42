<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpedienteCompartido extends Model
{
    protected $table = 'expedientescompartidos';
    protected $fillable = [
        'idExpediente','idMedico'
    ];
}
