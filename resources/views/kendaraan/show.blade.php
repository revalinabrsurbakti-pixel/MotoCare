@extends('layouts.app')

@section('title', 'Detail Kendaraan')
@section('page-title', 'Detail Kendaraan')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Informasi Kendaraan</h5>
            <p class="text-muted mb-0">
                Detail lengkap kendaraan pelanggan MotoCare.
            </p>
        </div>

        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="row g-3">

        <div class="col-md-6">
            <label class="text-muted mb-1">Nomor Plat Kendaraan</label>
            <div class="p-3 bg-light rounded">
                {{ $kendaraan->no_plat_kendaraan }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Nama Pemilik</label>
            <div class="p-3 bg-light rounded">
                {{ $kendaraan->nama_pemilik }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Jenis Kendaraan</label>
            <div class="p-3 bg-light rounded">
                {{ $kendaraan->jenis_kendaraan }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Nomor STNK</label>
            <div class="p-3 bg-light rounded">
                {{ $kendaraan->no_stnk }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Tahun Pembuatan</label>
            <div class="p-3 bg-light rounded">
                {{ $kendaraan->tahun_pembuatan }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Warna Kendaraan</label>
            <div class="p-3 bg-light rounded">
                {{ $kendaraan->warna }}
            </div>
        </div>

    </div>

    <div class="mt-4">
        <a href="{{ route('kendaraan.edit', $kendaraan->id) }}"
           class="btn btn-warning">
            <i class="bi bi-pencil me-1"></i> Edit Kendaraan
        </a>
    </div>

</div>

@endsection
