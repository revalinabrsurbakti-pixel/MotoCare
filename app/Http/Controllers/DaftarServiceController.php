<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    public function index()
    {
        $daftarServices = DaftarService::with(['pelanggan', 'kendaraan'])
            ->latest()
            ->get();

        return view('daftar_service.index', compact('daftarServices'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();

        return view('daftar_service.create', compact(
            'pelanggans',
            'kendaraans'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $validated['id_servis_pelanggan'] = 'SRV-' . strtoupper(uniqid());

        DaftarService::create($validated);

        return redirect()->route('daftar-service.index')
            ->with('success', 'Pendaftaran service berhasil ditambahkan.');
    }

    public function show(DaftarService $daftarService)
    {
        $daftarService->load(['pelanggan', 'kendaraan']);

        return view('daftar_service.show', compact('daftarService'));
    }

    public function edit(DaftarService $daftarService)
    {
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();

        return view('daftar_service.edit', compact(
            'daftarService',
            'pelanggans',
            'kendaraans'
        ));
    }

    public function update(Request $request, DaftarService $daftarService)
    {
        $validated = $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'keluhan_kendaraan' => 'required|string',
            'tanggal_servis' => 'required|date',
        ]);

        $daftarService->update($validated);

        return redirect()->route('daftar-service.index')
            ->with('success', 'Pendaftaran service berhasil diperbarui.');
    }

    public function destroy(DaftarService $daftarService)
    {
        $daftarService->delete();

        return redirect()->route('daftar-service.index')
            ->with('success', 'Pendaftaran service berhasil dihapus.');
    }
}
