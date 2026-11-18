@extends('layouts.app')

@section('title', 'Pembayaran Service')
@section('page-title', 'Pembayaran Service')

@section('content')

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Pembayaran Service</h5>
            <p class="text-muted mb-0">
                Daftar pembayaran service kendaraan pelanggan.
            </p>
        </div>

        <a href="{{ route('pembayaran-service.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Pembayaran
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>ID Servis Pelanggan</th>
                    <th>Jumlah Biaya</th>
                    <th>Jenis Pembayaran</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($pembayaranServices as $index => $pembayaranService)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>
                            {{ $pembayaranService->dataService->daftarService->id_servis_pelanggan ?? '-' }}
                        </td>

                        <td>
                            Rp {{ number_format($pembayaranService->jumlah_biaya_servis, 0, ',', '.') }}
                        </td>

                        <td>
                            <span class="badge bg-info text-dark">
                                {{ $pembayaranService->jenis_pembayaran }}
                            </span>
                        </td>

                        <td>{{ $pembayaranService->keterangan ?? '-' }}</td>

                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('pembayaran-service.show', $pembayaranService->id) }}"
                                   class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('pembayaran-service.edit', $pembayaranService->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('pembayaran-service.destroy', $pembayaranService->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')">
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
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada data pembayaran service.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
