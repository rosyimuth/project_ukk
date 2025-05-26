<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Industri;

class APIIndustriController extends Controller
{
    // Menampilkan semua industri
    public function index()
    {
        return response()->json(Industri::all(), 200);
    }

    // Menyimpan data industri baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'email' => 'required|email|unique:industri,email',
            'website' => 'nullable|url',
        ]);

        $industri = Industri::create($validated);
        return response()->json($industri, 201);
    }

    // Menampilkan data industri berdasarkan ID
    public function show(string $id)
    {
        $industri = Industri::findOrFail($id);
        return response()->json($industri, 200);
    }

    // Mengupdate data industri
    public function update(Request $request, string $id)
    {
        $industri = Industri::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_usaha' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'email' => 'required|email|unique:industri,email,' . $industri->id,
            'website' => 'nullable|url',
        ]);

        $industri->update($validated);
        return response()->json($industri, 200);
    }

    // Menghapus data industri
    public function destroy(string $id)
    {
        Industri::destroy($id);
        return response()->json(["message" => "Berhasil dihapus"], 200);
    }
}
