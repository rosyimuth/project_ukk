<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Informasi Industri
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg px-6 py-4">

                {{-- Flash Message --}}
                @if (session()->has('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-900 p-4 mb-4 rounded">
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                @endif

                {{-- Tombol dan Search --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-4">
                    <button wire:click="redirectToCreate"
                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-md font-semibold rounded">
                        Tambah Industri
                    </button>

                    <div class="relative md:w-64">
                        <input type="text" 
                            wire:model.live.300ms="search" 
                            placeholder="Search..." 
                            class="border border-gray-300 rounded px-6 py-2 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
                    </div>
                </div>

                {{-- Grid Card --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
                    @forelse ($industri as $item)
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 flex flex-col justify-between h-full">
        {{-- Gambar tetap proporsional --}}
        <div class="w-full aspect-[16/9] overflow-hidden rounded-t-lg">
            <img src="{{ $item->foto_industri ? asset('storage/' . $item->foto_industri) : 'https://via.placeholder.com/400x200?text=Industri' }}"
                alt="{{ $item->nama }}"
                class="w-full h-full object-cover transition duration-300 hover:scale-105">
        </div>

        {{-- Konten --}}
        <div class="p-4 space-y-1 flex-1">
            <h3 class="text-lg font-semibold text-gray-800">{{ $item->nama }}</h3>
            <p class="text-sm text-gray-600">Bidang: {{ $item->bidang_usaha }}</p>
            <p class="text-sm text-gray-600">Alamat: {{ $item->alamat }}</p>
            <p class="text-sm text-gray-600">Kontak: {{ $item->kontak }}</p>
            <p class="text-sm text-gray-600">Email: {{ $item->email }}</p>
            <p class="text-sm text-gray-600">Website: {{ $item->website }}</p>
        </div>
    </div>
@empty
    <div class="col-span-full text-center text-gray-500">
        Tidak ada data industri ditemukan.
    </div>
@endforelse

                </div>

                {{-- Pagination & PerPage --}}
                <div class="mt-6 flex flex-col md:flex-row justify-between items-center gap-3">
                    <div class="flex items-center gap-2">
                        <label for="perPage" class="text-sm font-medium">Tampilkan</label>
                        <select id="perPage" wire:model.live="perPage"
                            class="border border-gray-300 rounded-md px-5 py-2 text-sm focus:ring focus:border-blue-300 min-w-[110px]">
                            <option value="4">4</option>
                            <option value="8">8</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div>
                        {{ $industri->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
