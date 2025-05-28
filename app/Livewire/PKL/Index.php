<?php

namespace App\Livewire\PKL;

use App\Models\PKL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 5; 

    public function render()
{
    $query = PKL::with(['siswa', 'guru', 'industri'])->orderBy('created_at', 'asc');

    if (!empty($this->search)) {
        $query->where(function ($query) {
            $query->whereHas('siswa', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('guru', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('industri', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%');
            });
        });
    }

    return view('livewire.pkl.index', [
        'pkl' => $query->paginate($this->perPage),
    ]);
}

    public function redirectToCreate()
{
    return redirect()->route('pkl.create');
}

}
