@extends('layouts.app')

@section('title', 'Edit Kendaraan')
@section('page-title', 'Edit Data Kendaraan')

@section('content')

<div class="content-card">

    <div class="mb-4">
        <h5 class="fw-bold">Form Edit Kendaraan</h5>
        <p class="text-muted">
            Perbarui informasi kendaraan pelanggan MotoCare.
        </p>
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

    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Nomor Plat Kendaraan</label>
                <input type="text"
                       name="no_plat_kendaraan"
                       class="form-control"
                       value="{{ old('no_plat_kendaraan', $kendaraan->no_plat_kendaraan) }}"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Nama Pemilik</label>
                <select name="pelanggan_id" class="form-select" required>
                    <option value="">-- Pilih Pelanggan --</option>

                    @foreach($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}"
                            {{ old('pelanggan_id', $kendaraan->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>
                            {{ $pelanggan->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label d-block">Jenis Kendaraan</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input"
                           type="radio"
                           name="jenis_kendaraan"
                           value="Matic"
                           {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) == 'Matic' ? 'checked' : '' }}
                           required>
                    <label class="form-check-label">Matic</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input"
                           type="radio"
                           name="jenis_kendaraan"
                           value="Manual Transmisi"
                           {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan) == 'Manual Transmisi' ? 'checked' : '' }}>
                    <label class="form-check-label">Manual Transmisi</label>
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label">Nomor STNK</label>
                <input type="text"
                       name="no_stnk"
                       class="form-control"
                       value="{{ old('no_stnk', $kendaraan->no_stnk) }}"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Tahun Pembuatan</label>
                <input type="number"
                       name="tahun_pembuatan"
                       class="form-control"
                       value="{{ old('tahun_pembuatan', $kendaraan->tahun_pembuatan) }}"
                       min="1900"
                       max="{{ date('Y') }}"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Warna Kendaraan</label>
                <input type="text"
                       name="warna"
                       class="form-control"
                       value="{{ old('warna', $kendaraan->warna) }}"
                       required>
            </div>

        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Perubahan
            </button>

            <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection
