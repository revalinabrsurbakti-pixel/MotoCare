@extends('layouts.app')

@section('title', 'Data Kendaraan')
@section('page-title', 'Data Kendaraan')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Daftar Kendaraan</h5>
            <p class="text-muted mb-0">
                Kelola informasi kendaraan milik pelanggan MotoCare.
            </p>
        </div>

        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Kendaraan
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
                    <th>No. Plat</th>
                    <th>Jenis Kendaraan</th>
                    <th>No. STNK</th>
                    <th>Tahun</th>
                    <th>Nama Pemilik</th>
                    <th>Warna</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kendaraans as $kendaraan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kendaraan->no_plat_kendaraan }}</td>
                        <td>{{ $kendaraan->jenis_kendaraan }}</td>
                        <td>{{ $kendaraan->no_stnk }}</td>
                        <td>{{ $kendaraan->tahun_pembuatan }}</td>
                        <td>{{ $kendaraan->nama_pemilik }}</td>
                        <td>{{ $kendaraan->warna }}</td>
                        <td>
                            <div class="d-flex gap-1">

                                <a href="{{ route('kendaraan.show', $kendaraan->id) }}"
                                   class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('kendaraan.edit', $kendaraan->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus kendaraan ini?')">
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
                            Belum ada data kendaraan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
