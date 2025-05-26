<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PKL;

class APIPklController extends Controller
{
    // Menampilkan semua data PKL
    public function index()
    {
        return response()->json(PKL::with(['siswa', 'guru', 'industri'])->get(), 200);
    }

    // Menyimpan data PKL baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'guru_id' => 'required|exists:guru,id',
            'industri_id' => 'required|exists:industri,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        $pkl = PKL::create($validated);
        return response()->json($pkl, 201);
    }

    // Menampilkan data PKL berdasarkan ID
    public function show(string $id)
    {
        $pkl = PKL::with(['siswa', 'guru', 'industri'])->findOrFail($id);
        return response()->json($pkl, 200);
    }

    // Mengupdate data PKL
    public function update(Request $request, string $id)
    {
        $pkl = PKL::findOrFail($id);

        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'guru_id' => 'nullable|exists:guru,id',
            'industri_id' => 'required|exists:industri,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        $pkl->update($validated);
        return response()->json($pkl, 200);
    }

    // Menghapus data PKL
    public function destroy(string $id)
    {
        PKL::destroy($id);
        return response()->json(["message" => "Berhasil dihapus"], 200);
    }
}
