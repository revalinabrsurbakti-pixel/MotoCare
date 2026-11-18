<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KendaraanApiController extends Controller
{
    // GET: Menampilkan semua kendaraan
    public function index()
    {
        $kendaraans = Kendaraan::with('pelanggan')->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Data kendaraan berhasil ditampilkan.',
            'data' => $kendaraans
        ], 200);
    }

    // POST: Menambahkan kendaraan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_plat_kendaraan' => 'required|string|max:20|unique:kendaraans,no_plat_kendaraan',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'nama_pemilik' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:100',
            'no_stnk' => 'required|string|max:50',
            'tahun_pembuatan' => 'required|integer',
            'warna' => 'required|string|max:50',
        ]);

        $kendaraan = Kendaraan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data kendaraan berhasil ditambahkan.',
            'data' => $kendaraan
        ], 201);
    }

    // GET: Menampilkan detail kendaraan
    public function show($id)
    {
        $kendaraan = Kendaraan::with('pelanggan')->find($id);

        if (!$kendaraan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kendaraan tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail kendaraan berhasil ditampilkan.',
            'data' => $kendaraan
        ], 200);
    }

    // PUT: Mengubah data kendaraan
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);

        if (!$kendaraan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kendaraan tidak ditemukan.'
            ], 404);
        }

        $validated = $request->validate([
            'no_plat_kendaraan' => [
                'required',
                'string',
                'max:20',
                Rule::unique('kendaraans', 'no_plat_kendaraan')->ignore($kendaraan->id),
            ],
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'nama_pemilik' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:100',
            'no_stnk' => 'required|string|max:50',
            'tahun_pembuatan' => 'required|integer',
            'warna' => 'required|string|max:50',
        ]);

        $kendaraan->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data kendaraan berhasil diperbarui.',
            'data' => $kendaraan
        ], 200);
    }

    // DELETE: Menghapus kendaraan
    public function destroy($id)
    {
        $kendaraan = Kendaraan::find($id);

        if (!$kendaraan) {
            return response()->json([
                'success' => false,
                'message' => 'Data kendaraan tidak ditemukan.'
            ], 404);
        }

        $kendaraan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data kendaraan berhasil dihapus.'
        ], 200);
    }
}
