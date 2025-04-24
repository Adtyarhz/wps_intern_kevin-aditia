<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LogHarian;
use Illuminate\Support\Facades\Auth;

class VerifikasiLogHarian extends Component
{
    public $pendingLogs;

    public function mount()
    {
        $subordinateIds = Auth::user()->subordinates()->pluck('id');
        $this->pendingLogs = LogHarian::whereIn('user_id', $subordinateIds)
            ->where('status', 'pending')
            ->with('user')
            ->orderBy('tanggal', 'desc')
            ->get();
    }

    public function approve($logId)
    {
        $log = LogHarian::findOrFail($logId);
        if ($log->user->supervisor_id === Auth::id()) {
            $log->update(['status' => 'disetujui']);
            session()->flash('message', 'Log disetujui.');
            $this->mount();
        }
    }

    public function reject($logId)
    {
        $log = LogHarian::findOrFail($logId);
        if ($log->user->supervisor_id === Auth::id()) {
            $log->update(['status' => 'ditolak']);
            session()->flash('message', 'Log ditolak.');
            $this->mount();
        }
    }

    public function render()
    {
        return view('livewire.verifikasi-log-harian')->layout('layouts.app');
    }
}