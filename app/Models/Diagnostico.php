<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;
    public function historials(){
        return $this->belongsToMany('App\Models\Historial');
    }
    public function reportes(){
        return $this->belongsToMany('App\Models\Reporte');
    }
}
