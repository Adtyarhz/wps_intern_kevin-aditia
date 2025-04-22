<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LogHarian;

class DashboardCalendar extends Component
{
    public $events = [];

    public function mount()
    {
        $logs = LogHarian::with('user')->get();

        $this->events = $logs->map(function ($log) {
            return [
                'title' => $log->user->name,
                'start' => $log->tanggal,
                'status' => $log->status,
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard-calendar');
    }
}
