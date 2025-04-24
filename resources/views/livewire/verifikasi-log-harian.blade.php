<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Verifikasi Log Harian Bawahan</h2>
    @if ($pendingLogs->isEmpty())
        <p class="text-gray-500">Tidak ada log harian yang perlu diverifikasi.</p>
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pegawai</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">File Bukti</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($pendingLogs as $log)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $log->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $log->tanggal->format('d-m-Y') }}</td>
                        <td class="px-6 py-4">{{ $log->deskripsi }}</td>
                        <td class="px-6 py-4">
                            @if ($log->file_bukti)
                                <a href="{{ asset('storage/' . $log->file_bukti) }}" target="_blank" class="text-blue-600">Lihat</a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button wire:click="approve({{ $log->id }})" class="bg-green-600 text-white px-3 py-1 rounded-md mr-2">Setujui</button>
                            <button wire:click="reject({{ $log->id }})" class="bg-red-600 text-white px-3 py-1 rounded-md">Tolak</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>