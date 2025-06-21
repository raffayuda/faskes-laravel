<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Faskes;
use App\Models\JenisFaskes;
use App\Models\Provinsi;
use Illuminate\Support\Facades\DB;

#[Layout('components.layouts.app')]
#[Title('Beranda - SI Faskes')]
class Home extends Component
{
    public function render()
    {
        // Mengambil statistik dari database
        $stats = [
            'total_faskes' => Faskes::count(),
            'total_provinsi' => Provinsi::count(),
            'rumah_sakit' => $this->getFaskesByJenis(['Rumah Sakit', 'RS']),
            'puskesmas' => $this->getFaskesByJenis(['Puskesmas']),
            'klinik' => $this->getFaskesByJenis(['Klinik']),
        ];

        return view('livewire.home', compact('stats'));
    }

    private function getFaskesByJenis($jenisNames)
    {
        return Faskes::whereHas('jenisFaskes', function($query) use ($jenisNames) {
            $query->whereIn('nama', $jenisNames);
        })->count();
    }
}
