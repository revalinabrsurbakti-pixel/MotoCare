@extends('layouts.app')

@section('title', 'Detail Pelanggan')
@section('page-title', 'Detail Pelanggan')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Informasi Pelanggan</h5>
            <p class="text-muted mb-0">Detail lengkap data pelanggan MotoCare.</p>
        </div>

        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="row g-3">

        <div class="col-md-6">
            <label class="text-muted mb-1">ID Pelanggan</label>
            <div class="p-3 bg-light rounded">
                {{ $pelanggan->id_pelanggan }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Nama Lengkap</label>
            <div class="p-3 bg-light rounded">
                {{ $pelanggan->nama_lengkap }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Nomor HP</label>
            <div class="p-3 bg-light rounded">
                {{ $pelanggan->no_hp }}
            </div>
        </div>

        <div class="col-md-6">
            <label class="text-muted mb-1">Pekerjaan</label>
            <div class="p-3 bg-light rounded">
                {{ $pelanggan->pekerjaan }}
            </div>
        </div>

        <div class="col-12">
            <label class="text-muted mb-1">Alamat Pelanggan</label>
            <div class="p-3 bg-light rounded">
                {{ $pelanggan->alamat_pelanggan }}
            </div>
        </div>

    </div>

    <div class="mt-4">
        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
           class="btn btn-warning">
            <i class="bi bi-pencil me-1"></i> Edit Pelanggan
        </a>
    </div>

</div>

@endsection
