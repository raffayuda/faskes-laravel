<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Faskes as FaskesModel;
use App\Models\JenisFaskes;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Faskes extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedJenis = '';
    public $selectedProvinsi = '';
    public $perPage = 12;
    
    // Modal properties
    public $showModal = false;
    public $selectedFaskes = null;
    public $loadingModal = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedJenis' => ['except' => ''],
        'selectedProvinsi' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedJenis()
    {
        $this->resetPage();
    }

    public function updatingSelectedProvinsi()
    {
        $this->resetPage();
    }

    public function showDetail($faskesId)
    {
        try {
            $this->loadingModal = true;
            $this->selectedFaskes = FaskesModel::with([
                'kabkota.provinsi', 
                'jenisFaskes', 
                'kategori', 
                'ratings'
            ])->find($faskesId);
            
            if ($this->selectedFaskes) {
                $this->showModal = true;
            }
            
            $this->loadingModal = false;
        } catch (\Exception $e) {
            $this->loadingModal = false;
            session()->flash('error', 'Gagal memuat detail faskes');
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedFaskes = null;
        $this->loadingModal = false;
    }

    public function toggleFavorite($faskesId)
    {
        if (!Auth::check()) {
            session()->flash('error', 'Silakan login terlebih dahulu');
            return;
        }

        $userId = Auth::id();
        
        // Check if already favorited using the pivot table
        $isFavorited = DB::table('faskes_favorites')
            ->where('user_id', $userId)
            ->where('faskes_id', $faskesId)
            ->exists();
        
        if ($isFavorited) {
            // Remove from favorites
            DB::table('faskes_favorites')
                ->where('user_id', $userId)
                ->where('faskes_id', $faskesId)
                ->delete();
            session()->flash('message', 'Faskes dihapus dari favorit');
            $this->dispatch('favoriteToggled', ['faskesId' => $faskesId, 'action' => 'removed']);
        } else {
            // Add to favorites
            DB::table('faskes_favorites')->insert([
                'user_id' => $userId,
                'faskes_id' => $faskesId,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            session()->flash('message', 'Faskes ditambahkan ke favorit');
            $this->dispatch('favoriteToggled', ['faskesId' => $faskesId, 'action' => 'added']);
        }
    }

    public function isFavorite($faskesId)
    {
        if (!Auth::check()) {
            return false;
        }
        
        return DB::table('faskes_favorites')
            ->where('user_id', Auth::id())
            ->where('faskes_id', $faskesId)
            ->exists();
    }

    public function render()
    {
        $query = FaskesModel::with(['kabkota.provinsi', 'jenisFaskes', 'kategori']);

        // Search filter
        if ($this->search) {
            $query->where(function($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('alamat', 'like', '%' . $this->search . '%')
                  ->orWhere('nama_pengelola', 'like', '%' . $this->search . '%');
            });
        }

        // Jenis faskes filter
        if ($this->selectedJenis) {
            $query->where('jenis_faskes_id', $this->selectedJenis);
        }

        // Provinsi filter
        if ($this->selectedProvinsi) {
            $query->whereHas('kabkota', function($q) {
                $q->where('provinsi_id', $this->selectedProvinsi);
            });
        }

        $faskes = $query->paginate($this->perPage);
        $jenisFaskes = JenisFaskes::all();
        $provinsi = Provinsi::all();

        return view('livewire.faskes', [
            'faskes' => $faskes,
            'jenisFaskes' => $jenisFaskes,
            'provinsi' => $provinsi,
        ]);
    }
}
