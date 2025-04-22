<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LogHarian;
use App\Models\User;

class VerifikasiLogHarian extends Component
{
    public $bawahanLogs = [];

    public function mount()
    {
        $bawahanIds = auth()->user()->bawahan()->pluck('id');

        $this->bawahanLogs = LogHarian::with('user')
            ->whereIn('user_id', $bawahanIds)
            ->orderBy('tanggal', 'desc')
            ->get();
    }

    public function verifikasi($logId, $status)
    {
        $log = LogHarian::findOrFail($logId);

        if (!in_array($status, ['disetujui', 'ditolak'])) return;

        $log->update(['status' => $status]);

        session()->flash('message', 'Log berhasil diverifikasi.');

        $this->mount();
    }
    
    public function render()
    {
        return view('livewire.verifikasi-log-harian');
    }
}
