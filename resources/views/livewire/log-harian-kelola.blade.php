<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Kelola Log Harian</h2>
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" wire:model="tanggal" id="tanggal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('tanggal') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea wire:model="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4"></textarea>
            @error('description') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="proof" class="block text-sm font-medium text-gray-700">File Bukti (opsional)</label>
            <input type="file" wire:model="proof" id="proof" class="mt-1 block w-full">
            @error('proof') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
    </form>

    <h3 class="text-lg font-semibold mt-6 mb-4">Daftar Log Harian</h3>
    @if ($logs->isEmpty())
        <p class="text-gray-500">Belum ada log harian.</p>
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">File Bukti</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($logs as $log)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $log->tanggal->format('d-m-Y') }}</td>
                        <td class="px-6 py-4">{{ $log->deskripsi }}</td>
                        <td class="px-6 py-4">
                            @if ($log->file_bukti)
                                <a href="{{ asset('storage/' . $log->file_bukti) }}" target="_blank" class="text-blue-600">Lihat</a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ ucfirst($log->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>