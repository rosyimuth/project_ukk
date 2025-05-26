<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;

class APIGuruController extends Controller
{
    /**
     * Menampilkan semua data guru.
     * Endpoint: GET /api/guru
     */
    public function index()
    {
        return response()->json(Guru::all(), 200);
    }

    /**
     * Menyimpan data guru baru ke database.
     * Endpoint: POST /api/guru
     * Validasi dilakukan untuk memastikan data wajib diisi & unik.
     */
    public function store(Request $request)
    {
        // Validasi input dari request
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:guru,nip',
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'email' => 'required|email|unique:guru,email',
        ]);

        // Simpan data guru baru
        $guru = Guru::create($validated);
        return response()->json($guru, 201); // 201 = Created
    }

    /**
     * Menampilkan detail salah satu guru berdasarkan ID.
     * Endpoint: GET /api/guru/{id}
     */
    public function show(string $id)
    {
        // Cari guru berdasarkan ID atau tampilkan 404 jika tidak ada
        $guru = Guru::findOrFail($id);
        return response()->json($guru, 200);
    }

    /**
     * Mengupdate data guru berdasarkan ID.
     * Endpoint: PUT /api/guru/{id}
     * Validasi juga memperbolehkan NIP dan email yang tidak berubah.
     */
    public function update(Request $request, string $id)
    {
        // Cari data guru berdasarkan ID
        $guru = Guru::findOrFail($id);

        // Validasi input dengan pengecualian untuk NIP dan email milik guru ini
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:guru,nip,' . $guru->id,
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'email' => 'required|email|unique:guru,email,' . $guru->id,
        ]);

        // Update data guru
        $guru->update($validated);
        return response()->json($guru, 200);
    }

    /**
     * Menghapus data guru berdasarkan ID.
     * Endpoint: DELETE /api/guru/{id}
     */
    public function destroy(string $id)
    {
        Guru::destroy($id);
        return response()->json(["message" => "Berhasil terhapus"], 200);
    }
}
