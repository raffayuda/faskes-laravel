<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Faskes;

class Favorit extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 12;
    
    // Modal properties
    public $showModal = false;
    public $selectedFaskes = null;
    public $loadingModal = false;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // Redirect to login if not authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    }

    public function showDetail($faskesId)
    {
        try {
            $this->loadingModal = true;
            $this->selectedFaskes = Faskes::with([
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

    public function render()
    {
        // Get user's favorite faskes using the pivot table
        $query = Faskes::whereHas('favoritedByUsers', function($q) {
            $q->where('user_id', Auth::id());
        })->with(['kabkota.provinsi', 'jenisFaskes', 'kategori', 'ratings']);

        // Search filter
        if ($this->search) {
            $query->where(function($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                  ->orWhere('alamat', 'like', '%' . $this->search . '%')
                  ->orWhere('nama_pengelola', 'like', '%' . $this->search . '%');
            });
        }

        $favorites = $query->paginate($this->perPage);

        return view('livewire.favorit', [
            'favorites' => $favorites,
        ]);
    }
}
