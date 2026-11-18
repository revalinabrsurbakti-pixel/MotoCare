@extends('layouts.app')

@section('title', 'Detail Pembayaran')
@section('page-title', 'Detail Pembayaran Service')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Detail Pembayaran Service</h5>
            <p class="text-muted mb-0">
                Informasi pembayaran service kendaraan pelanggan.
            </p>
        </div>

        <a href="{{ route('pembayaran-service.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="row g-3">

        <div class="col-md-6">
            <label class="text-muted mb-1">ID Servis Pelanggan</label>
            <div class="p-3 bg-light rounded">
                {{ $pembayaranService->dataService->daftarService->id_servis_pelanggan ?? '-' }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Jumlah Biaya Service</label>
            <div class="p-3 bg-light rounded">
                Rp {{ number_format($pembayaranService->jumlah_biaya_servis, 0, ',', '.') }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Jenis Pembayaran</label>
            <div class="p-3 bg-light rounded">
                {{ $pembayaranService->jenis_pembayaran }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Keterangan</label>
            <div class="p-3 bg-light rounded">
                {{ $pembayaranService->keterangan ?? '-' }}
            </div>
        </div>

    </div>

    <div class="mt-4">
        <a href="{{ route('pembayaran-service.edit', $pembayaranService->id) }}"
           class="btn btn-warning">
            <i class="bi bi-pencil me-1"></i> Edit Pembayaran
        </a>
    </div>

</div>

@endsection
