<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
   
    use HasFactory;
    protected $fillable=['ci','nombre','paterno','materno','celular','fechanac','direccion','user_id'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    
}
