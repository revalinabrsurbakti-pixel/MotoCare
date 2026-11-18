<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PembayaranService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PembayaranServiceApiController extends Controller
{
    // GET: Menampilkan seluruh pembayaran
    public function index()
    {
        $pembayarans = PembayaranService::with('dataService')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran service berhasil ditampilkan.',
            'data' => $pembayarans
        ], 200);
    }

    // POST: Menambahkan pembayaran
    public function store(Request $request)
    {
        $validated = $request->validate([
            'data_service_id' => 'required|exists:data_services,id',
            'jumlah_biaya_servis' => 'required|numeric|min:0',
        ]);

        $pembayaran = PembayaranService::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran service berhasil ditambahkan.',
            'data' => $pembayaran
        ], 201);
    }

    // GET: Menampilkan detail pembayaran
    public function show($id)
    {
        $pembayaran = PembayaranService::with('dataService')->find($id);

        if (!$pembayaran) {
            return response()->json([
                'success' => false,
                'message' => 'Data pembayaran service tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail pembayaran service berhasil ditampilkan.',
            'data' => $pembayaran
        ], 200);
    }

    // PUT: Mengubah pembayaran
    public function update(Request $request, $id)
    {
        $pembayaran = PembayaranService::find($id);

        if (!$pembayaran) {
            return response()->json([
                'success' => false,
                'message' => 'Data pembayaran service tidak ditemukan.'
            ], 404);
        }

        $validated = $request->validate([
            'data_service_id' => 'required|exists:data_services,id',
            'jumlah_biaya_servis' => 'required|numeric|min:0',
        ]);

        $pembayaran->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran service berhasil diperbarui.',
            'data' => $pembayaran
        ], 200);
    }

    // DELETE: Menghapus pembayaran
    public function destroy($id)
    {
        $pembayaran = PembayaranService::find($id);

        if (!$pembayaran) {
            return response()->json([
                'success' => false,
                'message' => 'Data pembayaran service tidak ditemukan.'
            ], 404);
        }

        $pembayaran->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran service berhasil dihapus.'
        ], 200);
    }
}
