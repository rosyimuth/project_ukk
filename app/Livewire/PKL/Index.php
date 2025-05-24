<?php

namespace App\Livewire\PKL;

use App\Models\PKL;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Industri;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $siswaId, $industriId, $guruId, $mulai, $selesai;
    public bool $isOpen = false;

    use WithPagination;

    public $rowPerPage = 3;
    public $search;
    public $userMail;

    public function mount()
    {
        // mengambil email user yang sedang login
        $this->userMail = Auth::user()->email;
    }

    public function render()
    {
        // ambil data PKL dengan pencarian jika ada
        $pklQuery = Pkl::latest();

        if ($this->search !== null) {
            $pklQuery->where(function ($query) {
                $query->whereHas('siswa', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                })->orWhereHas('industri', function ($q) {
                    $q->where('nama', 'like', '%' . $this->search . '%');
                });
            });
        }

        return view('livewire.pkl.index', [
            'pkl' => $pklQuery->paginate($this->rowPerPage),
            'siswa_login' => Siswa::where('email', $this->userMail)->first(),
            'industri' => Industri::all(),
            'guru' => Guru::all(),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->siswaId = '';
        $this->industriId = '';
        $this->guruId = '';
        $this->mulai = '';
        $this->selesai = '';
    }

    public function store()
    {
        $this->validate([
            'siswaId' => 'required',
            'industriId' => 'required',
            'guruId' => 'nullable',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
        ]);

        DB::beginTransaction();

        try {
            $siswa = Siswa::find($this->siswaId);

            if ($siswa->status_lapor_pkl) {
                DB::rollBack();
                $this->closeModal();
                return redirect()->route('dashboard')->with('error', 'Transaksi dibatalkan: Siswa sudah melapor.');
            }

            // Simpan data PKL
            Pkl::create([
                'siswa_id' => $this->siswaId,
                'industri_id' => $this->industriId,
                'guru_id' => $this->guruId,
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
            ]);

            // Jika ingin update status_lapor_pkl siswa, aktifkan ini:
            // $siswa->update(['status_lapor_pkl' => 1]);

            DB::commit();

            $this->closeModal();
            $this->resetInputFields();

            return redirect()->route('dashboard')->with('success', 'Data PKL berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->closeModal();
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
