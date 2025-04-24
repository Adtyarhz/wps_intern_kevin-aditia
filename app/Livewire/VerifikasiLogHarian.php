<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LogHarian;
use Illuminate\Support\Facades\Auth;

class VerifikasiLogHarian extends Component
{
    public $pendingLogs;
    public $selectedLog;

    public function mount($log = null)
    {
        $allowedRoles = ['direktur', 'manager', 'manager_operasional', 'manager_keuangan'];
        if (!in_array(Auth::user()->role, $allowedRoles)) {
            abort(403, 'Aksi tidak diizinkan.');
        }

        if ($log) {
            $this->selectedLog = LogHarian::where('id', $log)
                ->where('status', 'pending')
                ->with('user')
                ->firstOrFail();
        } else {
            $this->selectedLog = null; // Pastikan $selectedLog kosong jika tidak ada parameter
        }

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
            session()->flash('message', 'Log berhasil disetujui.');
            // Redirect ke /verify-logs tanpa parameter log
            return redirect()->route('verify-logs');
        } else {
            session()->flash('error', 'Anda tidak berwenang untuk menyetujui log ini.');
            $this->mount($this->selectedLog ? $this->selectedLog->id : null);
        }
    }

    public function reject($logId)
    {
        $log = LogHarian::findOrFail($logId);
        if ($log->user->supervisor_id === Auth::id()) {
            $log->update(['status' => 'ditolak']);
            session()->flash('message', 'Log berhasil ditolak.');
            // Redirect ke /verify-logs tanpa parameter log
            return redirect()->route('verify-logs');
        } else {
            session()->flash('error', 'Anda tidak berwenang untuk menolak log ini.');
            $this->mount($this->selectedLog ? $this->selectedLog->id : null);
        }
    }

    public function render()
    {
        return view('livewire.verifikasi-log-harian')->layout('layouts.app');
    }
}