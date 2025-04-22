<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LogHarian;

class LogHarianList extends Component
{
    public $logs;

    public function mount()
    {
        $this->logs = LogHarian::where('user_id', auth()->id())
                        ->orderBy('tanggal', 'desc')
                        ->get();
    }

    public function render()
    {
        return view('livewire.log-harian-list');
    }
}
