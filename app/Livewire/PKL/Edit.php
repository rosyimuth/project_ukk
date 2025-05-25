<?php

namespace App\Livewire\Pkl;

use App\Models\Guru;
use App\Models\Industri;
use App\Models\Pkl;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $pkl_id, $siswa_id, $guru_id, $industri_id, $mulai, $selesai;
    public $siswaList, $guruList, $industriList;
    public $bukanSuperAdmin;

    public function mount($id)
    {
        $this->bukanSuperAdmin = Auth::user()->role !== 'super_admin';

        $pkl = Pkl::findOrFail($id);

        $this->pkl_id      = $pkl->id;
        $this->siswa_id    = $pkl->siswa_id;
        $this->guru_id     = $pkl->guru_id;
        $this->industri_id = $pkl->industri_id;
        $this->mulai       = $pkl->mulai;
        $this->selesai     = $pkl->selesai;

        $this->siswaList     = Siswa::all();
        $this->guruList      = Guru::all();
        $this->industriList  = Industri::all();
    }

    public function update()
    {
        $this->validate([
            'siswa_id'     => 'required|integer',
            'guru_id'      => 'nullable|integer',
            'industri_id'  => 'required|integer',
            'mulai'        => 'required|date',
            'selesai'      => 'required|date|after:mulai',
        ]);

        DB::beginTransaction();
        try {
            Pkl::whereKey($this->pkl_id)->update([
                'siswa_id'    => $this->siswa_id,
                'guru_id'     => $this->guru_id,
                'industri_id' => $this->industri_id,
                'mulai'       => $this->mulai,
                'selesai'     => $this->selesai,
            ]);

            DB::commit();
            session()->flash('success', 'Data PKL berhasil diperbarui!');
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('error', 'Kesalahan: '.$e->getMessage());
        }

        return redirect()->route('pkl.index');
    }

    public function render()
    {
        return view('livewire.pkl.edit', [
            'siswaList'     => $this->siswaList,
            'industriList'  => $this->industriList,
            'guruList'      => $this->guruList,
        ]);
    }
}
