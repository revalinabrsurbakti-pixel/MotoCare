@extends('layouts.app')

@section('title', 'Edit Daftar Service')
@section('page-title', 'Edit Daftar Service')

@section('content')

<div class="content-card">

    <div class="mb-4">
        <h5 class="fw-bold">Form Edit Daftar Service</h5>
        <p class="text-muted">
            Perbarui informasi pendaftaran service pelanggan.
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

    <form action="{{ route('daftar-service.update', $daftarService->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">ID Servis Pelanggan</label>
                <input type="text"
                       class="form-control"
                       value="{{ $daftarService->id_servis_pelanggan }}"
                       disabled>
            </div>

            <div class="col-md-6">
                <label class="form-label">Nomor Plat Kendaraan</label>
                <select name="kendaraan_id" class="form-select" required>
                    <option value="">-- Pilih Nomor Plat --</option>

                    @foreach($kendaraans as $kendaraan)
                        <option value="{{ $kendaraan->id }}"
                            {{ old('kendaraan_id', $daftarService->kendaraan_id) == $kendaraan->id ? 'selected' : '' }}>
                            {{ $kendaraan->no_plat_kendaraan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">ID Pelanggan</label>
                <select name="pelanggan_id"
                        id="pelanggan_id"
                        class="form-select"
                        required>

                    <option value="">-- Pilih ID Pelanggan --</option>

                    @foreach($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}"
                                data-nama="{{ $pelanggan->nama_lengkap }}"
                            {{ old('pelanggan_id', $daftarService->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>
                            {{ $pelanggan->id_pelanggan }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Nama Pelanggan</label>
                <input type="text"
                       id="nama_pelanggan"
                       class="form-control"
                       placeholder="Nama pelanggan muncul otomatis"
                       readonly>
            </div>

            <div class="col-md-6">
                <label class="form-label">Tanggal Service</label>
                <input type="date"
                       name="tanggal_servis"
                       class="form-control"
                       value="{{ old('tanggal_servis', $daftarService->tanggal_servis) }}"
                       required>
            </div>

            <div class="col-12">
                <label class="form-label">Keluhan Kendaraan</label>
                <textarea name="keluhan_kendaraan"
                          class="form-control"
                          rows="4"
                          required>{{ old('keluhan_kendaraan', $daftarService->keluhan_kendaraan) }}</textarea>
            </div>

        </div>

        <div class="mt-4 d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Perubahan
            </button>

            <a href="{{ route('daftar-service.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

<script>
    const pelangganSelect = document.getElementById('pelanggan_id');
    const namaPelanggan = document.getElementById('nama_pelanggan');

    function tampilkanNamaPelanggan() {
        const pilihan = pelangganSelect.options[pelangganSelect.selectedIndex];
        namaPelanggan.value = pilihan.dataset.nama || '';
    }

    pelangganSelect.addEventListener('change', tampilkanNamaPelanggan);

    tampilkanNamaPelanggan();
</script>

@endsection
