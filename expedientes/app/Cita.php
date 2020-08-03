<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    				
    protected $fillable = [
        'idExpediente','fechaAsignada','estadoCita','observaciones'
    ];
}
