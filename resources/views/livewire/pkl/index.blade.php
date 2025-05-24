<div class="py-12 bg-gray-50 dark:bg-zinc-900">
    <div class="max-w-7xl mx-auto px-4">

        {{-- Card utama dengan kelas Flux --}}
        <div class="card card-shadow rounded-lg p-6 space-y-6 bg-white dark:bg-zinc-800 shadow-lg">

            {{-- Notifikasi --}}
            <div class="space-y-2">
                @if (session()->has('error'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                        class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session()->has('success'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                        class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            {{-- Form Entry & Search --}}
            <div class="mx-auto flex items-center justify-between bg-white p-4 rounded-lg shadow-md">
                <!-- Tombol Create Lapor PKL di kiri -->
                <button wire:click="create()" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                    Create Lapor PKL
                </button>

                {{-- form searching --}}
                <input wire:model.live="search" type="text" placeholder="Search ... " class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                {{-- cek apakah menampilkan halaman modal --}}
                @if($isOpen)
                    @include('livewire.pkl.create')
                @endif
            </div>

            {{-- Tabel --}}
            <div class="p-4">
                <table class="table table-zebra w-full text-sm border-collapse border border-gray-300 dark:border-zinc-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-zinc-700 border-b border-gray-300 dark:border-zinc-600">
                            <th class="border border-gray-300 dark:border-zinc-700 px-2 py-2">Nama Siswa</th>
                            <th class="border border-gray-300 dark:border-zinc-700 px-2 py-2">NIS</th>
                            <th class="border border-gray-300 dark:border-zinc-700 px-2 py-2">Industri</th>
                            <th class="border border-gray-300 dark:border-zinc-700 px-2 py-2">Guru Pembimbing</th>
                            <th class="border border-gray-300 dark:border-zinc-700 px-2 py-2">Tanggal Mulai</th>
                            <th class="border border-gray-300 dark:border-zinc-700 px-2 py-2">Tanggal Selesai</th>
                            <th class="border border-gray-300 dark:border-zinc-700 px-2 py-2">Durasi (Hari)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            use Carbon\Carbon;
                            $no = ($pkl->currentPage() - 1) * $pkl->perPage();
                        @endphp
                        @foreach($pkl as $item)
                            @php
                                $no++;
                                $selisihHari = Carbon::parse($item->mulai)->diffInDays(Carbon::parse($item->selesai));
                            @endphp
                            <tr class="hover:bg-gray-100 dark:hover:bg-zinc-600 border border-gray-300 dark:border-zinc-700">
                                <td class="border border-gray-300 dark:border-zinc-700 px-2 py-2">{{ $item->siswa->nama }}</td>
                                <td class="border border-gray-300 dark:border-zinc-700 px-2 py-2">{{ $item->siswa->nis }}</td>
                                <td class="border border-gray-300 dark:border-zinc-700 px-2 py-2">{{ $item->industri->nama }}</td>
                                <td class="border border-gray-300 dark:border-zinc-700 px-2 py-2">{{ $item->guru->nama }}</td>
                                <td class="border border-gray-300 dark:border-zinc-700 px-2 py-2">{{ $item->mulai }}</td>
                                <td class="border border-gray-300 dark:border-zinc-700 px-2 py-2">{{ $item->selesai }}</td>
                                <td class="border border-gray-300 dark:border-zinc-700 px-2 py-2">{{ $selisihHari }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="pt-4 text-center">
                {{ $pkl->links() }}
            </div>

        </div>
    </div>
</div>
