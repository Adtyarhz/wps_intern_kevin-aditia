<div>
    <h3 class="text-lg font-bold mb-4">Verifikasi Log Harian Bawahan</h3>

    @if (session()->has('message'))
        <div class="mb-4 text-green-600">
            {{ session('message') }}
        </div>
    @endif

    @forelse ($bawahanLogs as $log)
        <div class="mb-4 p-4 border rounded shadow-sm bg-white">
            <p class="font-semibold text-gray-800">{{ $log->user->name }} - {{ $log->tanggal }}</p>
            <p class="mt-1 text-gray-700">{{ $log->deskripsi }}</p>

            @if($log->file_bukti)
                <p class="mt-2">
                    <a href="{{ Storage::url($log->file_bukti) }}" target="_blank" class="text-blue-600 hover:underline">Lihat Bukti</a>
                </p>
            @endif

            <div class="mt-3">
                @if($log->status === 'pending')
                    <button wire:click="verifikasi({{ $log->id }}, 'disetujui')" class="px-3 py-1 bg-green-600 text-white rounded mr-2 hover:bg-green-700">Setujui</button>
                    <button wire:click="verifikasi({{ $log->id }}, 'ditolak')" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Tolak</button>
                @else
                    <span class="text-sm text-gray-500">Status: <strong class="capitalize">{{ $log->status }}</strong></span>
                @endif
            </div>
        </div>
    @empty
        <p class="text-gray-500">Tidak ada log harian untuk diverifikasi.</p>
    @endforelse
</div>
