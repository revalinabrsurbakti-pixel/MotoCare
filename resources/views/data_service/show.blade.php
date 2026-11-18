@extends('layouts.app')

@section('title', 'Detail Data Service')
@section('page-title', 'Detail Data Service')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Detail Data Service</h5>
            <p class="text-muted mb-0">
                Informasi pengerjaan service kendaraan.
            </p>
        </div>

        <a href="{{ route('data-service.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="row g-3">

        <div class="col-md-6">
            <label class="text-muted mb-1">ID Servis Pelanggan</label>
            <div class="p-3 bg-light rounded">
                {{ $dataService->daftarService->id_servis_pelanggan ?? '-' }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Estimasi Service</label>
            <div class="p-3 bg-light rounded">
                Rp {{ number_format($dataService->estimasi_service, 0, ',', '.') }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Nama Mekanik</label>
            <div class="p-3 bg-light rounded">
                {{ $dataService->nama_mekanik }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Sparepart Pengganti</label>
            <div class="p-3 bg-light rounded">
                {{ $dataService->sparepart_pengganti ?? '-' }}
            </div>
        </div>

        <div class="col-12">
            <label class="text-muted mb-1">Keluhan Kendaraan</label>
            <div class="p-3 bg-light rounded">
                {{ $dataService->daftarService->keluhan_kendaraan ?? '-' }}
            </div>
        </div>

    </div>

    <div class="mt-4">
        <a href="{{ route('data-service.edit', $dataService->id) }}"
           class="btn btn-warning">
            <i class="bi bi-pencil me-1"></i> Edit Data Service
        </a>
    </div>

</div>

@endsection
