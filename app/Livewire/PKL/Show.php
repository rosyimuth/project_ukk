<?php

namespace App\Livewire\Pkl;

use App\Models\Pkl;
use Livewire\Component;

class Show extends Component
{
    public $pkl;

    public function mount($id)
    {
        $this->pkl = Pkl::with(['siswa', 'guru', 'industri'])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pkl.show');
    }
}
