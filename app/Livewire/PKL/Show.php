<?php

namespace App\Livewire\PKL;

use App\Models\PKL;
use Livewire\Component;

class Show extends Component
{
    public $pkl;

    public function mount($id)
    {
        $this->pkl = PKL::with(['siswa', 'guru', 'industri'])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pkl.show');
    }
}
