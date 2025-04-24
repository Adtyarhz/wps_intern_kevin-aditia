<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4">Manage Daily Logs</h2>

    <!-- Flash Message -->
    @if (session('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form Input -->
    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label for="tanggal" class="block text-sm font-medium text-gray-700">Date</label>
            <input 
                type="date" 
                wire:model="tanggal" 
                id="tanggal" 
                min="{{ $minDate }}" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                required>
            @error('tanggal') 
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea 
                wire:model="description" 
                id="description" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                rows="4" 
                required></textarea>
            @error('description') 
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span> 
            @enderror
        </div>
        <div>
            <label for="proof" class="block text-sm font-medium text-gray-700">Proof File (optional, jpg/png/pdf, max 2MB)</label>
            <input 
                type="file" 
                wire:model="proof" 
                id="proof" 
                class="mt-1 block w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            @error('proof') 
                <span class="text-red-600 text-sm mt-1">{{ $message }}</span> 
            @enderror
        </div>
        <button 
            type="submit" 
            class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Save
        </button>
    </form>

    <!-- Log List -->
    <h3 class="text-lg font-semibold mt-6 mb-4">List of Daily Logs</h3>
    @if ($logs->isEmpty())
        <p class="text-gray-500">No daily logs available.</p>
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Proof File</th>
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
                                <a href="{{ asset('storage/' . $log->file_bukti) }}" target="_blank" class="text-blue-600 hover:underline">View</a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="{{ $log->status == 'disetujui' ? 'text-green-600' : ($log->status == 'ditolak' ? 'text-red-600' : 'text-yellow-600') }}">
                                {{ ucfirst($log->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>