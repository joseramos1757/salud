<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Paciente;
use JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter;
use Carbon\Carbon;
//para la paginacion
use Livewire\WithPagination;
class ShowPacients extends Component
{
    //para la paginacion
    use WithPagination;
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
    public $search; 
    public $cant=5;
    public $showModal = false; // Propiedad para controlar la visibilidad del modal

    public function crearPaciente(){
        //$this->clean();
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
        session()->flash('msg', 'EL PACIENTE ' . $this->nombre . ' ' . $this->paterno . ' HA SIDO REGISTRADO');
        //$this->clean();
        $this->showModal = false;
    }       
    public function render()
    {
        
        $pacient = Paciente::where('nombre','like','%'.$this->search.'%')
                    ->orWhere('ci', 'like', '%' . $this->search . '%')
                    ->orderBy('id', 'desc')
                    ->paginate($this->cant);
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

        // Metodo encargado de la limpieza
        //public function clean(){
         //  $this->reset(['ci','nombre','paterno','materno','direccion','celular','estadocivil','sexo','ocupacion','observaciones','search']);
         //  $this->resetErrorBag();
       // }
}
