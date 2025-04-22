<div class="p-4 bg-white rounded shadow-md">
    @if (session()->has('success'))
        <div class="p-2 mb-3 text-green-700 bg-green-100 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="simpan">
        <div class="mb-4">
            <label for="tanggal" class="block mb-1 font-medium">Tanggal</label>
            <input type="date" wire:model="tanggal" class="w-full border rounded p-2">
            @error('tanggal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block mb-1 font-medium">Deskripsi</label>
            <textarea wire:model="deskripsi" class="w-full border rounded p-2" rows="4"></textarea>
            @error('deskripsi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="file_bukti" class="block mb-1 font-medium">Upload Bukti (Opsional)</label>
            <input type="file" wire:model="file_bukti" class="w-full border p-2 rounded">
            @error('file_bukti') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan Log</button>
    </form>
</div>
