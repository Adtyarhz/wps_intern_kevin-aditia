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
    public $isi_log;
    public $bukti;

    protected $rules = [
        'tanggal' => 'required|date',
        'deskripsi' => 'required|string',
        'file_bukti' => 'nullable|file|max:2048',
    ];

    public function simpan()
    {
        $this->validate();

        $path = $this->bukti ? $this->bukti->store('file_bukti-log', 'public') : null;

        LogHarian::create([
            'user_id' => Auth::id(),
            'tanggal' => $this->tanggal,
            'deskripsi' => $this->isi_log,
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
