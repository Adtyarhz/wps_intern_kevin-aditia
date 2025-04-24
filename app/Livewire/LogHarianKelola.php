<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\LogHarian;
use Illuminate\Support\Facades\Auth;

class LogHarianKelola extends Component
{
    use WithFileUploads;

    public $description;
    public $proof;
    public $logs;
    public $tanggal;

    public function mount()
    {
        $this->logs = LogHarian::where('user_id', Auth::id())->orderBy('tanggal', 'desc')->get();
        $this->tanggal = now()->format('Y-m-d');
    }

    public function save()
    {
        $this->validate([
            'tanggal' => 'required|date',
            'description' => 'required|string|max:1000',
            'proof' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

        $proofPath = $this->proof ? $this->proof->store('proofs', 'public') : null;

        LogHarian::create([
            'user_id' => Auth::id(),
            'tanggal' => $this->tanggal,
            'deskripsi' => $this->description,
            'file_bukti' => $proofPath,
            'status' => 'pending',
        ]);

        $this->reset(['description', 'proof', 'tanggal']);
        $this->tanggal = now()->format('Y-m-d');
        $this->mount();

        session()->flash('message', 'Log harian berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.log-harian-kelola')->layout('layouts.app');
    }
}