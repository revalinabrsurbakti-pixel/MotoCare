@extends('layouts.app')

@section('title', 'Tambah Data Service')
@section('page-title', 'Tambah Data Service')

@section('content')

<div class="content-card">

    <h5 class="fw-bold mb-1">Tambah Data Service</h5>
    <p class="text-muted mb-4">
        Masukkan informasi pengerjaan service kendaraan.
    </p>

    <form action="{{ route('data-service.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">ID Servis Pelanggan</label>
            <select name="daftar_service_id" id="daftar_service_id"
                    class="form-select" required>
                <option value="">-- Pilih ID Servis Pelanggan --</option>

                @foreach($daftarServices as $daftarService)
                    <option value="{{ $daftarService->id }}"
                        data-keluhan="{{ $daftarService->keluhan_kendaraan }}"
                        {{ old('daftar_service_id') == $daftarService->id ? 'selected' : '' }}>
                        {{ $daftarService->id_servis_pelanggan }}
                    </option>
                @endforeach
            </select>
            @error('daftar_service_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keluhan Kendaraan</label>
            <textarea id="keluhan_kendaraan" class="form-control"
                      rows="3" readonly
                      placeholder="Keluhan akan muncul otomatis"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Estimasi Service (Rp)</label>
            <input type="number" name="estimasi_service"
                   class="form-control" min="0" step="0.01"
                   value="{{ old('estimasi_service') }}"
                   placeholder="Masukkan estimasi biaya service" required>
            @error('estimasi_service')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Mekanik</label>
            <input type="text" name="nama_mekanik"
                   class="form-control"
                   value="{{ old('nama_mekanik') }}"
                   placeholder="Masukkan nama mekanik" required>
            @error('nama_mekanik')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label">Sparepart Pengganti</label>
            <textarea name="sparepart_pengganti" class="form-control"
                      rows="3"
                      placeholder="Masukkan sparepart yang diganti (jika ada)">{{ old('sparepart_pengganti') }}</textarea>
            @error('sparepart_pengganti')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Data
            </button>

            <a href="{{ route('data-service.index') }}"
               class="btn btn-secondary">Batal</a>
        </div>

    </form>

</div>

<script>
    const pilihanService = document.getElementById('daftar_service_id');
    const kolomKeluhan = document.getElementById('keluhan_kendaraan');

    function tampilkanKeluhan() {
        const pilihan = pilihanService.options[pilihanService.selectedIndex];
        kolomKeluhan.value = pilihan ? pilihan.dataset.keluhan || '' : '';
    }

    pilihanService.addEventListener('change', tampilkanKeluhan);
    tampilkanKeluhan();
</script>

@endsection
