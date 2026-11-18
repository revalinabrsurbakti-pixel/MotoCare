<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    public function index()
    {
        $dataServices = DataService::with('daftarService.pelanggan')
            ->latest()
            ->get();

        return view('data_service.index', compact('dataServices'));
    }

    public function create()
    {
        $daftarServices = DaftarService::with('pelanggan')->get();

        return view('data_service.create', compact('daftarServices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        DataService::create($validated);

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil ditambahkan.');
    }

    public function show(DataService $dataService)
    {
        $dataService->load('daftarService.pelanggan');

        return view('data_service.show', compact('dataService'));
    }

    public function edit(DataService $dataService)
    {
        $daftarServices = DaftarService::with('pelanggan')->get();

        return view('data_service.edit', compact(
            'dataService',
            'daftarServices'
        ));
    }

    public function update(Request $request, DataService $dataService)
    {
        $validated = $request->validate([
            'daftar_service_id' => 'required|exists:daftar_services,id',
            'estimasi_service' => 'required|numeric|min:0',
            'nama_mekanik' => 'required|string|max:255',
            'sparepart_pengganti' => 'nullable|string',
        ]);

        $dataService->update($validated);

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil diperbarui.');
    }

    public function destroy(DataService $dataService)
    {
        $dataService->delete();

        return redirect()->route('data-service.index')
            ->with('success', 'Data service berhasil dihapus.');
    }
}
