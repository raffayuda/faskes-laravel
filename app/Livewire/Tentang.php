<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Tentang Kami - SI Faskes')]
class Tentang extends Component
{
    public function render()
    {
        return view('livewire.tentang');
    }
}
