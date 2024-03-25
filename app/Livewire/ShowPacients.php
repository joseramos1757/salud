<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Paciente;
use JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter;
use Carbon\Carbon;
//para la paginacion
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Attributes\On;
class ShowPacients extends Component
{
    //para la paginacion
    use WithPagination;

    public $pacientCount=0;
    //propiedades modelo
    public $ci;
    public $nombre;
    public $paterno;
    public $materno;
    public $celular;
    public $direccion;
    public $estadocivil='';
    public $sexo='';
    public $fechanac;
    public $ocupacion;
    public $observaciones;
    public $title;
    public $search; 
    public $cant=5;
   // public $showModal = false; // Propiedad para controlar la visibilidad del modal

   //para edicion 
   public $Id;

//crear pacientes
    public function store(){

    // Convierte la fecha de nacimiento a un objeto Carbon
    $fechaNacimiento = Carbon::createFromFormat('Y-m-d', $this->fechanac);

    // Calcula la edad
    $edad = $fechaNacimiento->diffInYears(Carbon::now());


        $rules = [
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
        ];
    
        $this->validate($rules);

        $paciente=new Paciente();
        $paciente->ci = $this->ci;
        $paciente->nombre = $this->nombre;
        $paciente->paterno = $this->paterno;
        $paciente->materno = $this->materno;
        $paciente->celular = $this->celular;
        $paciente->direccion = $this->direccion;
        $paciente->estadocivil = $this->estadocivil;
        $paciente->sexo = $this->sexo;
        $paciente->fechanac = $this->fechanac;
        $paciente->ocupacion = $this->ocupacion;
        $paciente->edad = $edad; // Guarda la edad en la base de datos
        $paciente->observaciones = $this->observaciones; // Guarda la edad en la base de datos
        $paciente->save();
        //sirve para cerrar el modal enviando el id del modal
        $this->dispatch('close-modal','modalPaciente');

        Alert::success('Éxito', 'Paciente registrado correctamente');

        //sirve para mostrar el mensaje 
        //$this->dispatch('msg','PACIENTE REGISTRADO CORRECTAMENTE');
        //para reniciar los datos del formulario 
        return redirect()->route('paciente.pacients.index');
      
    }


    public function render()
    {
        if($this->search!=''){
            $this->resetPage();
        }
        $this->pacientCount=Paciente::count();
        
        $pacient = Paciente::where('nombre','like','%'.$this->search.'%')
                    ->orWhere('ci', 'like', '%' . $this->search . '%')
                    ->orderBy('id', 'desc')
                    ->paginate($this->cant);

        $this->title ='CANTIDAD DE PACIENTES';
        return view('livewire.show-pacients',compact('pacient'),[
            'title'=>$this->title,
        ]);
    }

    public function edit(Paciente $paciente){
        dump($this->Id);
 
        $this->ci=$paciente->ci;
        $this->nombre=$paciente->nombre;
        $this->paterno=$paciente->paterno;
        $this->materno=$paciente->materno;
        $this->celular=$paciente->celular;
        $this->direccion=$paciente->direccion;
        $this->estadocivil=$paciente->estadocivil;
        $this->sexo=$paciente->sexo;
        $this->fechanac=$paciente->fechanac;
        $this->ocupacion=$paciente->ocupacion;
        $this->observaciones=$paciente->observaciones;

         //sirve para cerrar el modal enviando el id del modal
         $this->dispatch('open-modal','modalPaciente');

       
        //dump($paciente);

    }

   /* #[On('destroyPacient')]
    public function destroy($id){
        
        $pacient = Paciente::findOrfail($id);


        $pacient->delete();

        $this->dispatch('msg','Usuario eliminado correctamente.');
    }*/
    
    
}
