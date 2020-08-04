<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitasMedicamento extends Model
{
    protected $table = 'citamedicamentos';
    protected $fillable = [
        'idMedicamento','idCita','dosis','frecuencia','viaAdministracion','duracion'
    ];
}
