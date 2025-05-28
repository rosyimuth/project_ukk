<?php

namespace App\Livewire\Industri;

use App\Models\Industri;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 4;
    public $foto_industri, $nama, $bidang_usaha, $alamat, $kontak, $email, $website;

    // Supaya nilai tetap di URL (opsional)
    protected $updatesQueryString = ['search', 'perPage'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Industri::orderBy('created_at', 'desc');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('bidang_usaha', 'like', '%' . $this->search . '%')
                    ->orWhere('kontak', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('website', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.industri.index', [
            'industri' => $query->paginate($this->perPage),
        ]);
    }

    public function redirectToCreate()
    {
        return redirect()->route('industri.create');
    }
}
