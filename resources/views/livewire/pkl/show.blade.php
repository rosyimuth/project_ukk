<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Lapor PKL
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded shadow">
                <h2 class="text-xl font-semibold mb-4">Detail Laporan PKL</h2>

                <ul class="space-y-2">
                    <li><strong>Nama Siswa:</strong> {{ $pkl->siswa->nama }}</li>
                    <li><strong>Industri:</strong> {{ $pkl->industri->nama }}</li>
                    <li><strong>Guru Pembimbing:</strong> {{ $pkl->guru->nama ?? '-' }}</li>
                    <li><strong>Tanggal Mulai:</strong> {{ $pkl->mulai }}</li>
                    <li><strong>Tanggal Selesai:</strong> {{ $pkl->selesai }}</li>
                    <li><strong>Durasi:</strong> {{ \Carbon\Carbon::parse($pkl->mulai)->diffInDays($pkl->selesai) }} hari</li>
                </ul>

                {{-- Tombol Aksi --}}
                <div class="mt-6 flex gap-6">
                    <a href="{{ route('pkl.index') }}"
                        class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
                        Kembali
                    </a>

                    <a href="{{ route('pkl.edit', ['id' => $pkl->id]) }}"
                        class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Edit
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
