<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    public function medico(){
        return $this->belongsTo('App\Models\Medico');
    }
    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }
    public function diagnosticos(){
        return $this->belongsToMany('App\Models\Diagnostico');
    }
    
}
