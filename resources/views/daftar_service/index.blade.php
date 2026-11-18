@extends('layouts.app')

@section('title', 'Daftar Service')
@section('page-title', 'Daftar Service')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Daftar Service Pelanggan</h5>
            <p class="text-muted mb-0">
                Kelola pendaftaran service kendaraan pelanggan.
            </p>
        </div>

        <a href="{{ route('daftar-service.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Daftar Service
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>ID Servis</th>
                    <th>No. Plat</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Keluhan Kendaraan</th>
                    <th>Tanggal Servis</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($daftarServices as $daftarService)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $daftarService->id_servis_pelanggan }}</td>
                        <td>{{ $daftarService->kendaraan->no_plat_kendaraan ?? '-' }}</td>
                        <td>{{ $daftarService->pelanggan->id_pelanggan ?? '-' }}</td>
                        <td>{{ $daftarService->pelanggan->nama_lengkap ?? '-' }}</td>
                        <td>{{ $daftarService->keluhan_kendaraan }}</td>
                        <td>{{ $daftarService->tanggal_servis }}</td>
                        <td>
                            <div class="d-flex gap-1">

                                <a href="{{ route('daftar-service.show', $daftarService->id) }}"
                                   class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('daftar-service.edit', $daftarService->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('daftar-service.destroy', $daftarService->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus daftar service ini?')">
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
                        <td colspan="8" class="text-center text-muted py-4">
                            Belum ada daftar service.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
