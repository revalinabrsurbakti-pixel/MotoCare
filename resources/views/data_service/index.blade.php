@extends('layouts.app')

@section('title', 'Data Service')
@section('page-title', 'Data Service')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Data Service</h5>
            <p class="text-muted mb-0">
                Daftar pengerjaan service kendaraan pelanggan.
            </p>
        </div>

        <a href="{{ route('data-service.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Data Service
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>ID Servis Pelanggan</th>
                    <th>Keluhan Kendaraan</th>
                    <th>Estimasi Service</th>
                    <th>Nama Mekanik</th>
                    <th>Sparepart Pengganti</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($dataServices as $index => $dataService)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>
                            {{ $dataService->daftarService->id_servis_pelanggan ?? '-' }}
                        </td>

                        <td>{{ $dataService->daftarService->keluhan_kendaraan ?? '-' }}</td>

                        <td>
                            Rp {{ number_format($dataService->estimasi_service, 0, ',', '.') }}
                        </td>

                        <td>{{ $dataService->nama_mekanik }}</td>

                        <td>{{ $dataService->sparepart_pengganti ?? '-' }}</td>

                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('data-service.show', $dataService->id) }}"
                                   class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('data-service.edit', $dataService->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('data-service.destroy', $dataService->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data service ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            Belum ada data service.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
