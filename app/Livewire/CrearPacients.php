<?php

namespace App\Livewire;

use Livewire\Component;

class CrearPacients extends Component
{
    public $open=true;
    public function render()
    {
        return view('livewire.crear-pacients');
    }
}
