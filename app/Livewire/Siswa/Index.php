<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        return view('livewire.siswa.index');
    }
}
