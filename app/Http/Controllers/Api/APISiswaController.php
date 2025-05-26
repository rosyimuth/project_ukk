<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;

class APISiswaController extends Controller
{
    // Menampilkan semua data siswa
    public function index()
    {
        return response()->json(Siswa::all(), 200);
    }

    // Menyimpan data siswa baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswa,nis',
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'email' => 'required|email|unique:siswa,email',
            'kelas' => 'required|string',
            'status_lapor_pkl' => 'required|boolean',
        ]);

        $siswa = Siswa::create($validated);
        return response()->json($siswa, 201);
    }

    // Menampilkan data siswa berdasarkan ID
    public function show(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return response()->json($siswa, 200);
    }

    // Mengupdate data siswa
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswa,nis,' . $siswa->id,
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'email' => 'required|email|unique:siswa,email,' . $siswa->id,
            'kelas' => 'required|string',
            'status_lapor_pkl' => 'required|boolean',
        ]);

        $siswa->update($validated);
        return response()->json($siswa, 200);
    }

    // Menghapus data siswa
    public function destroy(string $id)
    {
        Siswa::destroy($id);
        return response()->json(["message" => "Berhasil dihapus"], 200);
    }
}
