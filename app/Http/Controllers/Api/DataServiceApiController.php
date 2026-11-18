<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;

class DataServiceApiController extends Controller
{
    // GET: Menampilkan seluruh data service
    public function index()
    {
        $data = DataService::with(
            'daftarService.pelanggan'
        )->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil ditampilkan.',
            'data' => $data
        ], 200);
    }

    // POST: Menambahkan data service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $data = DataService::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil ditambahkan.',
            'data' => $data
        ], 201);
    }

    // GET: Menampilkan detail data service
    public function show($id)
    {
        $data = DataService::with(
            'daftarService.pelanggan'
        )->find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data service berhasil ditampilkan.',
            'data' => $data
        ], 200);
    }

    // PUT: Mengubah data service
    public function update(Request $request, $id)
    {
        $data = DataService::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan.'
            ], 404);
        }

        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $data->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil diperbarui.',
            'data' => $data
        ], 200);
    }

    // DELETE: Menghapus data service
    public function destroy($id)
    {
        $data = DataService::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data service tidak ditemukan.'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data service berhasil dihapus.'
        ], 200);
    }
}
