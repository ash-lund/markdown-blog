<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Frontpage extends Component
{
    #[Title('Welcome to the forest journals')]
    public function render()
    {
        return view('livewire.frontpage');
    }
}
