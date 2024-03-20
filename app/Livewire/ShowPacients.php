<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Paciente;
use JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter;
use Carbon\Carbon;
class ShowPacients extends Component
{
    public $ci;
    public $nombre;
    public $paterno;
    public $materno;
    public $celular;
    public $direccion;
    public $estadocivil;
    public $sexo;
    public $fechanac;
    public $ocupacion;
    public $observaciones;

    public $title;
    public $search='hola mundo san juan s'; 
    public function crearPaciente(){
          // Convierte la fecha de nacimiento a un objeto Carbon
          $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->fechanac);
        
          // Calcula la edad
          $edad = $fechaNacimiento->diffInYears(Carbon::now());
  
          $this-> validate([
            'ci'=>'required|unique:pacientes|numeric',
            'nombre'=>'required',
            'paterno'=>'required',
            'materno'=>'nullable',
            'celular' => ['required','numeric','between:60000000,79999999'],
            //'edad'=>'required',
            'sexo'=>'required',
            'estadocivil'=>'required',
            'ocupacion'=>'required',
            'fechanac'=>'required',
            'direccion'=>'required',
            'observaciones'=>'nullable'

        ]);
       Paciente::create([
        'ci' => $this->ci,
        'nombre' => $this->nombre,
        'paterno' => $this->paterno,
        'materno' => $this->materno,
        'celular' => $this->celular,
        'direccion' => $this->direccion,
        'estadocivil' => $this->estadocivil,
        'sexo' => $this->sexo,
        'fechanac' => $this->fechanac,
        'ocupacion' => $this->ocupacion,
        'edad' => $edad, // Guarda la edad en la base de datos
        'observaciones' => $this->observaciones, // Guarda la edad en la base de datos
       ]);

     //MENSAJE DE GUARDADO  
session()->flash('msg', 'El paciente ' . $this->nombre . ' ' . $this->paterno . ' ha sido registrado correctamente');
    }       
    public function render()
    {
        
        $pacient=Paciente::all()->reverse();
        $pacientCount=Paciente::count();
        //$pacient = Paciente::where('nombre','like','%'.$this->search.'%')->get();
       // $pacient = Paciente::where('ci', 'like', '%' . $this->search . '%')
        //->orWhere('nombre', 'like', '%' . $this->search . '%')
        //  ->get();
        //$pacient=Paciente::where('ci','like','%' . $this->search . '%')
        //->orWhere('nombre','like','%' . $this->search . '%')->get();
        $this->title ='CANTIDAD DE PACIENTES';
        return view('livewire.show-pacients',compact('pacient'),[
            'title'=>$this->title,
            'pacientCount'=>$pacientCount
        ]);
    }
}
