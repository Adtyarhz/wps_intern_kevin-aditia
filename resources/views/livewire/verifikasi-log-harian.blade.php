<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Verifikasi Log Harian Bawahan</h2>

    <!-- Detail Log Spesifik -->
    @if ($selectedLog)
        <div class="mb-6 p-4 bg-gray-100 rounded-lg">
            <h3 class="text-lg font-semibold mb-2">Detail Log</h3>
            <p><strong>Pegawai:</strong> {{ $selectedLog->user->name }}</p>
            <p><strong>Tanggal:</strong> {{ $selectedLog->tanggal->format('d-m-Y') }}</p>
            <p><strong>Deskripsi:</strong> {{ $selectedLog->deskripsi }}</p>
            @if ($selectedLog->file_bukti)
                <p><strong>File Bukti:</strong> <a href="{{ asset('storage/' . $selectedLog->file_bukti) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a></p>
            @else
                <p><strong>File Bukti:</strong> -</p>
            @endif
            <p><strong>Status:</strong> {{ ucfirst($selectedLog->status) }}</p>
            <div class="mt-4 space-x-2">
                <button wire:click="approve({{ $selectedLog->id }})" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Setujui</button>
                <button wire:click="reject({{ $selectedLog->id }})" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Tolak</button>
            </div>
        </div>
    @endif

    <!-- Daftar Log Pending -->
    <h3 class="text-lg font-semibold mb-2">Daftar Log Pending</h3>
    @if ($pendingLogs->isEmpty())
        <p class="text-gray-500">Tidak ada log harian yang perlu diverifikasi.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pegawai</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File Bukti</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($pendingLogs as $log)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $log->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $log->tanggal->format('d-m-Y') }}</td>
                            <td class="px-6 py-4">{{ Str::limit($log->deskripsi, 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($log->file_bukti)
                                    <a href="{{ asset('storage/' . $log->file_bukti) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                <button wire:click="approve({{ $log->id }})" class="bg-green-600 text-white px-3 py-1 rounded-md hover:bg-green-700">Setujui</button>
                                <button wire:click="reject({{ $log->id }})" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">Tolak</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>