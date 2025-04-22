<div>
    <h3 class="text-lg font-bold mb-4">Riwayat Log Harian Anda</h3>

    <table class="min-w-full text-sm table-auto">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Deskripsi</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Bukti</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
                <tr>
                    <td class="border px-4 py-2">{{ $log->tanggal }}</td>
                    <td class="border px-4 py-2">{{ $log->deskripsi }}</td>
                    <td class="border px-4 py-2">
                        @if($log->status == 'pending')
                            <span class="text-yellow-500">Pending</span>
                        @elseif($log->status == 'disetujui')
                            <span class="text-green-600">Disetujui</span>
                        @else
                            <span class="text-red-600">Ditolak</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        @if($log->file_bukti)
                            <a href="{{ Storage::url($log->file_bukti) }}" class="text-blue-600" target="_blank">Lihat Bukti</a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500 py-4">Belum ada log</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
