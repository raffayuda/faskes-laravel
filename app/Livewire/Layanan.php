<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Layanan Kami - SI Faskes')]
class Layanan extends Component
{
    public function render()
    {
        return view('livewire.layanan');
    }
}
