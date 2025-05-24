<div><x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buat Lapor PKL
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg px-6 py-4">

                <!-- Form PKL -->
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

                        <!-- Industri -->
                        <div>
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
                    <div class="mt-6 flex justify-end">
                        <button type="button"
                            onclick="window.history.back();"
                            class="px-6 py-2 border-2 border-gray-400 text-black font-semibold rounded">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>