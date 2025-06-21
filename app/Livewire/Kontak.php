<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Hubungi Kami - SI Faskes')]
class Kontak extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $subject = '';
    public $message = '';
    public $showSuccessMessage = false;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'phone' => 'required|min:10',
        'subject' => 'required|min:5',
        'message' => 'required|min:10',
    ];

    protected $messages = [
        'name.required' => 'Nama wajib diisi.',
        'name.min' => 'Nama minimal 2 karakter.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'phone.required' => 'Nomor telepon wajib diisi.',
        'phone.min' => 'Nomor telepon minimal 10 digit.',
        'subject.required' => 'Subjek wajib diisi.',
        'subject.min' => 'Subjek minimal 5 karakter.',
        'message.required' => 'Pesan wajib diisi.',
        'message.min' => 'Pesan minimal 10 karakter.',
    ];

    public function submitForm()
    {
        $this->validate();
        
        // Di sini bisa ditambahkan logic untuk mengirim email atau menyimpan ke database
        // Untuk sementara, kita hanya menampilkan pesan sukses
        
        $this->showSuccessMessage = true;
        $this->reset(['name', 'email', 'phone', 'subject', 'message']);
        
        // Reset pesan sukses setelah 5 detik
        $this->dispatch('show-success-message');
    }

    public function render()
    {
        return view('livewire.kontak');
    }
}
