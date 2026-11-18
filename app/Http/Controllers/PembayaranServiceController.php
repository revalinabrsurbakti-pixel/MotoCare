<?php

namespace App\Http\Controllers;

use App\Models\PembayaranService;
use App\Models\DataService;
use Illuminate\Http\Request;

class PembayaranServiceController extends Controller
{
    public function index()
    {
        $pembayaranServices = PembayaranService::with(
            'dataService.daftarService.pelanggan'
        )->latest()->get();

        return view('pembayaran_service.index', compact('pembayaranServices'));
    }

    public function create()
    {
        $dataServices = DataService::with(
            'daftarService.pelanggan'
        )->get();

        return view('pembayaran_service.create', compact('dataServices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'data_service_id' => 'required|exists:data_services,id',
            'jumlah_biaya_servis' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash/Tunai,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        PembayaranService::create($validated);

        return redirect()->route('pembayaran-service.index')
            ->with('success', 'Pembayaran service berhasil ditambahkan.');
    }

    public function show(PembayaranService $pembayaranService)
    {
        $pembayaranService->load(
            'dataService.daftarService.pelanggan'
        );

        return view('pembayaran_service.show', compact('pembayaranService'));
    }

    public function edit(PembayaranService $pembayaranService)
    {
        $dataServices = DataService::with(
            'daftarService.pelanggan'
        )->get();

        return view('pembayaran_service.edit', compact(
            'pembayaranService',
            'dataServices'
        ));
    }

    public function update(Request $request, PembayaranService $pembayaranService)
    {
        $validated = $request->validate([
            'data_service_id' => 'required|exists:data_services,id',
            'jumlah_biaya_servis' => 'required|numeric|min:0',
            'jenis_pembayaran' => 'required|in:Cash/Tunai,Non Tunai',
            'keterangan' => 'nullable|string',
        ]);

        $pembayaranService->update($validated);

        return redirect()->route('pembayaran-service.index')
            ->with('success', 'Pembayaran service berhasil diperbarui.');
    }

    public function destroy(PembayaranService $pembayaranService)
    {
        $pembayaranService->delete();

        return redirect()->route('pembayaran-service.index')
            ->with('success', 'Pembayaran service berhasil dihapus.');
    }
}
