<div class="fixed inset-0 z-10 overflow-y-auto ease-out duration-400">
  <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <!-- Trick to center modal content -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

    <div
      class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
      role="dialog" aria-modal="true" aria-labelledby="modal-headline">

      <div class="py-4 px-4">
        <h2 class="font-semibold">Lapor PKL</h2>
        <div class="mb-2">{{ $siswa_login->nama }}</div>
        <div class="border-t border-gray-300 my-2"></div>
      </div>

      <form wire:submit.prevent="store()">
        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
          <fieldset class="border border-gray-300 rounded-md p-4 mb-4">
            <legend class="text-lg text-gray-700 px-2">Siswa</legend>
            <select wire:model="siswaId" class="w-full p-2 border rounded-md">
              <option value="">Pilih Siswa</option>
              <option value="{{ $siswa_login->id }}">{{ $siswa_login->nama }}</option>
            </select>
            @error('siswaId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </fieldset>

          <fieldset class="border border-gray-300 rounded-md p-4 mb-4">
            <legend class="text-lg text-gray-700 px-2">Industri</legend>
            <select wire:model="industriId" class="w-full p-2 border rounded-md">
              <option value="">Pilih Industri</option>
              @foreach ($industri as $ind)
                <option value="{{ $ind->id }}">{{ $ind->nama }}</option>
              @endforeach
            </select>
            @error('industriId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </fieldset>

          <fieldset class="border border-gray-300 rounded-md p-4 mb-4">
            <legend class="text-lg text-gray-700 px-2">Guru Pembimbing</legend>
            <select wire:model="guruId" class="w-full p-2 border rounded-md">
              <option value="">Pilih Guru Pembimbing PKL</option>
              @foreach ($guru as $g)
                <option value="{{ $g->id }}">{{ $g->nama }}</option>
              @endforeach
            </select>
            @error('guruId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </fieldset>

          <fieldset class="border border-gray-300 rounded-md p-4 mb-4">
            <legend class="text-lg text-gray-700 px-2">Pelaksanaan PKL</legend>

            <label for="mulai" class="block mb-1 text-sm font-semibold text-gray-700">Mulai</label>
            <input wire:model="mulai" type="date" id="mulai" class="w-full p-2 border rounded-md mb-3 focus:ring focus:ring-blue-300 focus:outline-none" />
            @error('mulai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <label for="selesai" class="block mb-1 text-sm font-semibold text-gray-700">Selesai</label>
            <input wire:model="selesai" type="date" id="selesai" class="w-full p-2 border rounded-md focus:ring focus:ring-blue-300 focus:outline-none" />
            @error('selesai') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
          </fieldset>
        </div>

        <div
          class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
          <button wire:click.prevent="store()" type="button"
            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5">
            Save
          </button>
          <button wire:click="closeModal()" type="button"
            class="mt-3 inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm sm:leading-5">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
