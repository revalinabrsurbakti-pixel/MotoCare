@extends('layouts.app')

@section('title', 'Edit Pelanggan')
@section('page-title', 'Edit Data Pelanggan')

@section('content')

<div class="content-card">

    <div class="mb-4">
        <h5 class="fw-bold">Form Edit Pelanggan</h5>
        <p class="text-muted">Perbarui informasi pelanggan MotoCare.</p>
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

    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">ID Pelanggan</label>
                <input type="text"
                       class="form-control"
                       value="{{ $pelanggan->id_pelanggan }}"
                       disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label">Nama Lengkap</label>
                <input type="text"
                       name="nama_lengkap"
                       class="form-control"
                       value="{{ old('nama_lengkap', $pelanggan->nama_lengkap) }}"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Nomor HP</label>
                <input type="text"
                       name="no_hp"
                       class="form-control"
                       value="{{ old('no_hp', $pelanggan->no_hp) }}"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Pekerjaan</label>
                <input type="text"
                       name="pekerjaan"
                       class="form-control"
                       value="{{ old('pekerjaan', $pelanggan->pekerjaan) }}"
                       required>
            </div>

            <div class="col-12">
                <label class="form-label">Alamat Pelanggan</label>
                <textarea name="alamat_pelanggan"
                          class="form-control"
                          rows="3"
                          required>{{ old('alamat_pelanggan', $pelanggan->alamat_pelanggan) }}</textarea>
            </div>

        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Perubahan
            </button>

            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection
