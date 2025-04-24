@extends('layouts.app')

@section('header', __('Dashboard'))

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Calendar (untuk atasan) -->
            @if (auth()->user()->hasRole(['direktur', 'manager_operasional', 'manager_keuangan']))
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 mb-8">
                    <livewire:dashboard />
                </div>
            @endif

            <!-- Form dan Daftar Log Harian (untuk semua role) -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 mb-8">
                <livewire:log-harian-kelola />
            </div>

            <!-- Verifikasi Log Harian (hanya untuk atasan) -->
            @if (auth()->user()->hasRole(['direktur', 'manager_operasional', 'manager_keuangan']))
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <livewire:verifikasi-log-harian />
                </div>
            @endif
        </div>
    </div>
@endsection