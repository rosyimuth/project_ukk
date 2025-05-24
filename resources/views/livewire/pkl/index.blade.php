<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lapor PKL
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg px-6 py-4">

                {{-- Flash Message --}}
                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 text-teal-900 px-4 py-3 rounded mb-4">
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                @endif

                {{-- Tombol dan Search --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-2">
                    <button wire:click="redirectToCreate"
                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded">
                        Buat Lapor PKL
                    </button>

                    <div class="relative md:w-72">
                        <input type="text" wire:model="search" placeholder="Cari..."
                            class="w-full border border-gray-300 rounded-md pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring focus:border-blue-400">
                        <i class="bi bi-search absolute"></i>
                    </div>
                </div>

                {{-- Tabel PKL --}}
                <table class="table-fixed w-full text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2 w-1/6">Nama Siswa</th>
                            <th class="px-4 py-2 w-1/6">Industri</th>
                            <th class="px-4 py-2 w-1/6">Guru Pembimbing</th>
                            <th class="px-4 py-2 w-1/6">Tanggal Mulai</th>
                            <th class="px-4 py-2 w-1/6">Tanggal Selesai</th>
                            <th class="px-4 py-2 w-1/12">Durasi (Hari)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pkl as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="border px-4 py-2">{{ $item->siswa->nama ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $item->industri->nama ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $item->guru->nama ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $item->mulai }}</td>
                                <td class="border px-4 py-2">{{ $item->selesai }}</td>
                                <td class="border px-4 py-2">
                                    {{ \Carbon\Carbon::parse($item->mulai)->diffInDays($item->selesai) }} hari
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border px-4 py-3 text-center text-gray-500">
                                    Tidak ada data PKL ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination & PerPage --}}
                <div class="mt-6 flex flex-col md:flex-row justify-between items-center gap-3">
                    <div class="flex items-center gap-2">
                        <label for="perPage" class="text-sm font-medium">Tampilkan</label>
                        <select id="perPage" wire:model="perPage"
                            class="border border-gray-300 rounded-md px-5 py-2 text-sm focus:ring focus:border-blue-300 min-w-[110px]">
                            <option value="5">5 baris</option>
                            <option value="10">10 baris</option>
                            <option value="25">25 baris</option>
                            <option value="50">50 baris</option>
                        </select>
                    </div>
                    <div>{{ $pkl->links() }}</div>
                </div>

            </div>
        </div>
    </div>
</div>
