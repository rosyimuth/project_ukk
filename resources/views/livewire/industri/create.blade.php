<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Industri Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg px-6 py-4">
                <form wire:submit.prevent="store">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <!-- Nama Industri -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Industri</label>
                            <input type="text" wire:model.defer="nama"
                                class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Bidang Usaha -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Bidang Usaha</label>
                            <input type="text" wire:model.defer="bidang_usaha"
                                class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                            @error('bidang_usaha') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea wire:model.defer="alamat"
                            class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"></textarea>
                        @error('alamat') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <!-- Kontak -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kontak</label>
                            <input type="text" wire:model.defer="kontak"
                                class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                            @error('kontak') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" wire:model.defer="email"
                                class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Website -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Website</label>
                        <input type="url" wire:model.defer="website"
                            class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                        @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Upload Logo -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Logo Industri</label>
                        <input type="file" wire:model="foto_industri"
                            class="w-full mt-1 text-sm border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                        @error('foto_industri') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        @if ($foto_industri)
                            <p class="mt-2 text-sm text-gray-600">Preview:</p>
                            <img src="{{ $foto_industri->temporaryUrl() }}" class="h-32 mt-2 rounded">
                        @endif
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
            </div>
        </div>
    </div>
</div>
