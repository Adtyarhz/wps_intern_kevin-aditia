<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Kalender Log Harian --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 mb-8">
                @livewire('dashboard-calendar')
            </div>

            {{-- Form Tambah Log Harian --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <livewire:log-harian-form />
            </div>

            {{-- Komponen Log Saya --}}
            <div class="mt-6">
                <livewire:log-harian-list />
            </div>

            {{-- Jika user atasan --}}
        @can('verifikasi-log')
            <div class="mt-6">
                <livewire:verifikasi-log-harian />
            </div>
        @endcan
        </div>
    </div>
</x-app-layout>
