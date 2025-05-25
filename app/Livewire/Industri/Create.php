<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use App\Models\Industri;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $foto_industri, $nama, $bidang_usaha, $alamat, $kontak, $email, $website;

    protected $rules = [
        'nama' => 'required|string|max:255',
        'bidang_usaha' => 'required|string|max:255',
        'kontak' => 'nullable|string|max:100',
        'email' => 'nullable|email|max:255',
        'website' => 'nullable|url|max:255',
        'alamat' => 'required|string|max:255',
        'foto_industri' => 'nullable|image|max:1024',
    ];   

    public function store()
    {
        $validateData = $this->validate();

        // Simpan foto_industri jika diupload
        if ($this->foto_industri) {
            $validateData['foto_industri'] = $this->foto_industri->store('industri', 'public');
        }

        Industri::create($validateData);
        session()->flash('success', 'Data industri berhasil disimpan.');
        return redirect()->route('industri.index');
    }
    public function render()
    {
        return view('livewire.industri.create');
    }
}
