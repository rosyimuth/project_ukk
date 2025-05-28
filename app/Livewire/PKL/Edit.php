<?php

namespace App\Livewire\PKL;

use App\Models\Guru;
use App\Models\Industri;
use App\Models\PKL;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $pkl_id, $siswa_id, $guru_id, $industri_id, $mulai, $selesai;
    public $siswaList, $guruList, $industriList;
    public $bukanSuperAdmin;
    public $bolehHapus;
    

    public function mount($id)
    {
        $this->bukanSuperAdmin = (!Auth::user()->hasRole('super_admin'));
        $this->bolehHapus = Auth::user()->hasRole('super_admin');

        $pkl = PKL::findOrFail($id);

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
            PKL::whereKey($this->pkl_id)->update([
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

    // Method destroy untuk hapus data PKL, khusus admin dan super_admin
    public function destroy()
    {
        if (!Auth::user()->hasRole(['super_admin'])) {
            session()->flash('error', 'Akses ditolak: Anda tidak memiliki hak untuk menghapus data PKL.');
            return redirect()->route('pkl.index');
        }

        DB::beginTransaction();
        try {
            PKL::findOrFail($this->pkl_id)->delete();

            DB::commit();
            session()->flash('success', 'Data PKL berhasil dihapus!');
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('error', 'Kesalahan saat menghapus: ' . $e->getMessage());
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
