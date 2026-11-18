<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::with('pelanggan')->latest()->get();

        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();

        return view('kendaraan.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_plat_kendaraan' => 'required|string|max:255|unique:kendaraans,no_plat_kendaraan',
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:255|unique:kendaraans,no_stnk',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'warna' => 'required|string|max:100',
        ]);

        $pelanggan = Pelanggan::findOrFail($request->pelanggan_id);

        Kendaraan::create([
            'no_plat_kendaraan' => $request->no_plat_kendaraan,
            'pelanggan_id' => $pelanggan->id,
            'nama_pemilik' => $pelanggan->nama_lengkap,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'no_stnk' => $request->no_stnk,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'warna' => $request->warna,
        ]);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    public function show(Kendaraan $kendaraan)
    {
        $kendaraan->load('pelanggan');

        return view('kendaraan.show', compact('kendaraan'));
    }

    public function edit(Kendaraan $kendaraan)
    {
        $pelanggans = Pelanggan::all();

        return view('kendaraan.edit', compact('kendaraan', 'pelanggans'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'no_plat_kendaraan' => [
                'required',
                'string',
                'max:255',
                Rule::unique('kendaraans', 'no_plat_kendaraan')->ignore($kendaraan->id),
            ],
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => [
                'required',
                'string',
                'max:255',
                Rule::unique('kendaraans', 'no_stnk')->ignore($kendaraan->id),
            ],
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'warna' => 'required|string|max:100',
        ]);

        $pelanggan = Pelanggan::findOrFail($request->pelanggan_id);

        $kendaraan->update([
            'no_plat_kendaraan' => $request->no_plat_kendaraan,
            'pelanggan_id' => $pelanggan->id,
            'nama_pemilik' => $pelanggan->nama_lengkap,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'no_stnk' => $request->no_stnk,
            'tahun_pembuatan' => $request->tahun_pembuatan,
            'warna' => $request->warna,
        ]);

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui.');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus.');
    }
}
