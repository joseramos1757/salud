<?php

namespace App\Livewire\Historial;
use App\Models\Paciente;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

#[Title('REGISTRO DE ANAMNESIS')]
class HistorialComponent extends Component
{
        //para la paginacion
        use WithPagination;

        public $pacientCount=0;
        //propiedades modelo
        public $title;
        public $search; 

        public $cant=0;
        public $pacient;


    public function render()
    {
        $this->pacient = null; // Reiniciamos el valor del paciente
        
        if (!empty($this->search)) {
            $this->pacient = Paciente::where('nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('ci', 'like', '%' . $this->search . '%')
                    ->orderBy('id', 'desc')
                    ->first(); // Utilizamos first() para obtener solo un resultado
        }
        
        return view('livewire.historial.historial-component', [
            'title' => $this->title,
            'pacient' => $this->pacient,
        ]);
    }
}
