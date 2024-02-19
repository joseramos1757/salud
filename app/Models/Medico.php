<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $fillable=['ci','nombre','paterno','materno','especialidad','celular','fechanac','direccion','user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function historials(){
        return $this->hasMany('App\Models\Historial');
    }
    public function pacientes(){
        return $this->belongsToMany('App\Models\Paciente');
    }
}
