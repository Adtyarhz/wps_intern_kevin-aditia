<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:direktur')->group(function () {
        Route::get('/direktur', function () {
            return view('direktur.dashboard');
        })->name('direktur.dashboard');
    });

    Route::middleware('role:manager')->group(function () {
        Route::get('/manager', function () {
            return view('manager.dashboard');
        })->name('manager.dashboard');
    });

    Route::middleware('role:staff')->group(function () {
        Route::get('/staff', function () {
            return view('staff.dashboard');
        })->name('staff.dashboard');
    });
});
