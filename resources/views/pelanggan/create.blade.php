@extends('layouts.app')

@section('title', 'Tambah Pelanggan')
@section('page-title', 'Tambah Pelanggan')

@section('content')

<div class="content-card">

    <div class="mb-4">
        <h5 class="fw-bold">Form Tambah Pelanggan</h5>
        <p class="text-muted">Silakan lengkapi informasi pelanggan berikut.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali data yang dimasukkan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">ID Pelanggan</label>
                <input type="text"
                       class="form-control"
                       value="Otomatis dibuat oleh sistem"
                       disabled>
                <small class="text-muted">ID akan dibuat otomatis saat data disimpan.</small>
            </div>

            <div class="col-md-6">
                <label class="form-label">Nama Lengkap</label>
                <input type="text"
                       name="nama_lengkap"
                       class="form-control"
                       value="{{ old('nama_lengkap') }}"
                       placeholder="Masukkan nama lengkap"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Nomor HP</label>
                <input type="text"
                       name="no_hp"
                       class="form-control"
                       value="{{ old('no_hp') }}"
                       placeholder="Contoh: 081234567890"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Pekerjaan</label>
                <input type="text"
                       name="pekerjaan"
                       class="form-control"
                       value="{{ old('pekerjaan') }}"
                       placeholder="Masukkan pekerjaan"
                       required>
            </div>

            <div class="col-12">
                <label class="form-label">Alamat Pelanggan</label>
                <textarea name="alamat_pelanggan"
                          class="form-control"
                          rows="3"
                          placeholder="Masukkan alamat lengkap"
                          required>{{ old('alamat_pelanggan') }}</textarea>
            </div>

        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Data
            </button>

            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection
