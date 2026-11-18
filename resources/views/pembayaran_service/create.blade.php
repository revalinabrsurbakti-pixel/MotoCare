@extends('layouts.app')

@section('title', 'Tambah Pembayaran')
@section('page-title', 'Tambah Pembayaran Service')

@section('content')

<div class="content-card">

    <h5 class="fw-bold mb-1">Tambah Pembayaran Service</h5>
    <p class="text-muted mb-4">
        Masukkan informasi pembayaran service kendaraan pelanggan.
    </p>

    <form action="{{ route('pembayaran-service.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">ID Servis Pelanggan</label>
            <select name="data_service_id" class="form-select" required>
                <option value="">-- Pilih ID Servis Pelanggan --</option>

                @foreach($dataServices as $dataService)
                    <option value="{{ $dataService->id }}"
                        {{ old('data_service_id') == $dataService->id ? 'selected' : '' }}>
                        {{ $dataService->daftarService->id_servis_pelanggan ?? '-' }}
                    </option>
                @endforeach
            </select>

            @error('data_service_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Biaya Service (Rp)</label>
            <input type="number" name="jumlah_biaya_servis"
                   class="form-control" min="0" step="0.01"
                   value="{{ old('jumlah_biaya_servis') }}"
                   placeholder="Masukkan jumlah biaya service"
                   required>

            @error('jumlah_biaya_servis')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Jenis Pembayaran</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"
                       name="jenis_pembayaran" id="cash"
                       value="Cash/Tunai"
                       {{ old('jenis_pembayaran') == 'Cash/Tunai' ? 'checked' : '' }}
                       required>

                <label class="form-check-label" for="cash">
                    Cash/Tunai
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"
                       name="jenis_pembayaran" id="non_tunai"
                       value="Non Tunai"
                       {{ old('jenis_pembayaran') == 'Non Tunai' ? 'checked' : '' }}>

                <label class="form-check-label" for="non_tunai">
                    Non Tunai
                </label>
            </div>

            @error('jenis_pembayaran')
                <small class="text-danger d-block">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control"
                      rows="3"
                      placeholder="Masukkan keterangan pembayaran jika ada">{{ old('keterangan') }}</textarea>

            @error('keterangan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan Pembayaran
            </button>

            <a href="{{ route('pembayaran-service.index') }}"
               class="btn btn-secondary">Batal</a>
        </div>

    </form>

</div>

@endsection
