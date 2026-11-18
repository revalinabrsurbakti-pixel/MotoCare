<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DaftarServiceApiController extends Controller
{
    // GET: Menampilkan seluruh daftar service
    public function index()
    {
        $data = DaftarService::with([
            'pelanggan',
            'kendaraan'
        ])->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar service berhasil ditampilkan.',
            'data' => $data
        ], 200);
    }

    // POST: Menambahkan daftar service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $validated['id_servis_pelanggan'] =
            'SRV-' . strtoupper(uniqid());

        $data = DaftarService::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Daftar service berhasil ditambahkan.',
            'data' => $data
        ], 201);
    }

    // GET: Menampilkan detail daftar service
    public function show($id)
    {
        $data = DaftarService::with([
            'pelanggan',
            'kendaraan'
        ])->find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar service tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail daftar service berhasil ditampilkan.',
            'data' => $data
        ], 200);
    }

    // PUT: Mengubah daftar service
    public function update(Request $request, $id)
    {
        $data = DaftarService::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar service tidak ditemukan.'
            ], 404);
        }

        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $data->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Daftar service berhasil diperbarui.',
            'data' => $data
        ], 200);
    }

    // DELETE: Menghapus daftar service
    public function destroy($id)
    {
        $data = DaftarService::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar service tidak ditemukan.'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Daftar service berhasil dihapus.'
        ], 200);
    }
}
