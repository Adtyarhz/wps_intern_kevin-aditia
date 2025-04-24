<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LogHarian;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $events = [];

    public function mount()
    {
        $user = Auth::user();
        switch ($user->role) {
            case 'direktur':
            case 'manager_operasional':
            case 'manager_keuangan':
                break;
            case 'staf':
            case 'staff_operasional':
            case 'staff_keuangan':
                return redirect()->route('logs');
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Peran pengguna tidak dikenali.',
                ]);
        }

        $today = now()->format('Y-m-d');
        $subordinateIds = Auth::user()->subordinates()->pluck('id');
        $logs = LogHarian::whereIn('user_id', $subordinateIds)
            ->where('status', 'pending')
            ->whereDate('tanggal', $today)
            ->with('user')
            ->get();

        $this->events = $logs->map(function ($log) {
            return [
                'id' => $log->id,
                'title' => 'Log dari ' . $log->user->name,
                'start' => $log->tanggal->format('Y-m-d'),
                'description' => $log->deskripsi,
                'color' => '#2563eb',
                'url' => route('verify-logs', ['log' => $log->id]),
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}