<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Lapor PKL
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg px-6 py-4">
                
                {{-- Notifikasi jika sudah lapor --}}
                @if ($sudahLapor)
    <div class="mb-6 p-6 bg-yellow-50 border-l-4 border-yellow-400 rounded-lg shadow">
        <h3 class="text-xl font-semibold text-yellow-700 mb-1">Lapor PKL Sudah Dilakukan</h3>
        <p class="text-md text-yellow-600 mb-4">
            Kamu sudah melakukan lapor PKL. Form ini tidak bisa diisi lagi. Jika ada kesalahan, hubungi admin ya 😊
        </p>
        <div class="flex justify-center">
            <img src="https://illustrations.popsy.co/gray/woman-with-a-laptop.svg" alt="Sudah Lapor"
                class="w-48 h-auto object-contain">
        </div>
    </div>
@endif


                {{-- Form hanya muncul jika belum lapor --}}
                @if (!$sudahLapor)
                    <form wire:submit.prevent="store">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <!-- Siswa -->
                            <div>
                                <label for="siswa_id" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                                <select wire:model="siswa_id" id="siswa_id"
                                    class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                                    <option value=""></option>
                                    @foreach($siswaList as $siswa)
                                        <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                    @endforeach
                                </select>
                                @error('siswa_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Guru -->
                            <div>
                                <label for="guru_id" class="block text-sm font-medium text-gray-700">Guru</label>
                                <select wire:model="guru_id" id="guru_id"
                                    class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                                    <option value=""></option>
                                    @foreach($guruList as $guru)
                                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                    @endforeach
                                </select>
                                @error('guru_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Industri -->
                        <div class="mb-4">
                            <label for="industri_id" class="block text-sm font-medium text-gray-700">Industri</label>
                            <select wire:model="industri_id" id="industri_id"
                                class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                                <option value=""></option>
                                @foreach($industriList as $industri)
                                    <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                                @endforeach
                            </select>
                            @error('industri_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <!-- Tanggal Mulai -->
                            <div>
                                <label for="mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                                <input type="date" wire:model="mulai" id="mulai"
                                    class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                                @error('mulai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <!-- Tanggal Selesai -->
                            <div>
                                <label for="selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                <input type="date" wire:model="selesai" id="selesai"
                                    class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
                                @error('selesai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-6 flex justify-end gap-2">
                            <button type="button"
                                onclick="window.history.back();"
                                class="px-6 py-2 border-2 border-gray-400 text-black font-semibold rounded">
                                Batal
                            </button>

                            <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
                                Simpan
                            </button>
                        </div>
                    </form>
                @endif
                
            </div>
        </div>
    </div>
</div>
