<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\LogHarianKelola;
use App\Livewire\VerifikasiLogHarian;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/logs', LogHarianKelola::class)->name('logs');
    Route::get('/verify-logs', VerifikasiLogHarian::class)->name('verify-logs');
});