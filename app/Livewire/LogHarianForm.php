<?php

namespace App\Livewire;

use App\Models\LogHarian;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class LogHarianForm extends Component
{
    use WithFileUploads;

    public $tanggal;
    public $deskripsi;
    public $file_bukti;

    protected $rules = [
        'tanggal' => 'required|date',
        'deskripsi' => 'required|string',
        'file_bukti' => 'nullable|file|max:2048',
    ];

    public function simpan()
    {
        $this->validate();

        $path = $this->file_bukti ? $this->file_bukti->store('file_bukti-log', 'public') : null;

        LogHarian::create([
            'user_id' => Auth::id(),
            'tanggal' => $this->tanggal,
            'deskripsi' => $this->deskripsi,
            'file_bukti' => $path,
            'status' => 'pending',
        ]);

        session()->flash('success', 'Log harian berhasil disimpan!');
        $this->reset(['tanggal', 'deskripsi', 'file_bukti']);
    }
    
    public function render()
    {
        return view('livewire.log-harian-form');
    }
}
