@extends('layouts.app')

@section('title', 'Detail Daftar Service')
@section('page-title', 'Detail Daftar Service')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Informasi Daftar Service</h5>
            <p class="text-muted mb-0">
                Detail pendaftaran service kendaraan pelanggan.
            </p>
        </div>

        <a href="{{ route('daftar-service.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="row g-3">

        <div class="col-md-6">
            <label class="text-muted mb-1">ID Servis Pelanggan</label>
            <div class="p-3 bg-light rounded">
                {{ $daftarService->id_servis_pelanggan }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Nomor Plat Kendaraan</label>
            <div class="p-3 bg-light rounded">
                {{ $daftarService->kendaraan->no_plat_kendaraan ?? '-' }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">ID Pelanggan</label>
            <div class="p-3 bg-light rounded">
                {{ $daftarService->pelanggan->id_pelanggan ?? '-' }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Nama Pelanggan</label>
            <div class="p-3 bg-light rounded">
                {{ $daftarService->pelanggan->nama_lengkap ?? '-' }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Tanggal Service</label>
            <div class="p-3 bg-light rounded">
                {{ $daftarService->tanggal_servis }}
            </div>
        </div>

        <div class="col-12">
            <label class="text-muted mb-1">Keluhan Kendaraan</label>
            <div class="p-3 bg-light rounded">
                {{ $daftarService->keluhan_kendaraan }}
            </div>
        </div>

    </div>

    <div class="mt-4">
        <a href="{{ route('daftar-service.edit', $daftarService->id) }}"
           class="btn btn-warning">
            <i class="bi bi-pencil me-1"></i> Edit Daftar Service
        </a>
    </div>

</div>

@endsection
