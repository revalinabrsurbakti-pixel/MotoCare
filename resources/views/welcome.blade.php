@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')

<style>
    .hero {
        background: linear-gradient(120deg, #14243d, #245da8);
        padding: 32px;
        border-radius: 18px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .hero h2 {
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .hero p {
        color: #d7e5f8;
        font-size: 13px;
    }

    .hero-icon {
        position: absolute;
        right: 45px;
        top: 15px;
        font-size: 125px;
        color: rgba(255,255,255,.10);
        pointer-events: none;
    }

    .stat-link {
        display: block;
        height: 100%;
        text-decoration: none;
        color: inherit;
        position: relative;
        z-index: 2;
    }

    .stat-card {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 16px;
        padding: 23px;
        height: 100%;
        box-shadow: 0 5px 20px rgba(28,45,75,.04);
        transition: .25s;
        cursor: pointer;
    }

    .stat-link:hover .stat-card {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(28,45,75,.09);
        border-color: #8bb7ff;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        font-size: 23px;
    }

    .stat-number {
        font-size: 30px;
        font-weight: 800;
        color: #14243d;
        margin: 12px 0 4px;
    }

    .stat-label {
        color: #8491a5;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .7px;
    }

    .section-heading {
        color: #14243d;
        font-size: 16px;
        font-weight: 800;
    }

    .quick-card {
        display: flex;
        align-items: center;
        gap: 13px;
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 13px;
        padding: 17px;
        height: 100%;
        text-decoration: none;
        color: #24334b;
        transition: .2s;
        position: relative;
        z-index: 2;
        cursor: pointer;
    }

    .quick-card:hover {
        transform: translateY(-3px);
        border-color: #8bb7ff;
        background: #f8fbff;
        color: #2878f0;
    }

    .quick-icon {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ff;
        color: #2878f0;
        border-radius: 12px;
        font-size: 19px;
        flex-shrink: 0;
    }

    .quick-card small {
        display: block;
        color: #8995a8;
        font-size: 11px;
        margin-top: 4px;
    }

    .info-box {
        background: #f6f8fc;
        padding: 18px;
        border-radius: 13px;
    }

    .hero .btn {
        position: relative;
        z-index: 3;
    }

    .dashboard-content {
        position: relative;
        z-index: 1;
    }
</style>

<div class="dashboard-content">

    {{-- HERO --}}
    <div class="hero">
        <div style="position:relative; z-index:2;">
            <span class="badge bg-light text-primary rounded-pill px-3 py-2 mb-3">
                <i class="bi bi-stars me-1"></i>
                MOTORCYCLE SERVICE MANAGEMENT
            </span>

            <h2>Selamat Datang di MotoCare!</h2>

            <p class="mb-4">
                Satu sistem untuk mengelola pelanggan, kendaraan,
                pelayanan service, dan pembayaran bengkel motor.
            </p>

            <a href="{{ route('daftar-service.create') }}"
               class="btn btn-light text-primary">
                <i class="bi bi-plus-circle me-1"></i>
                Buat Service Baru
            </a>
        </div>

        <i class="bi bi-gear-wide-connected hero-icon"></i>
    </div>

    {{-- STATISTIK --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ route('pelanggan.index') }}" class="stat-link">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="stat-label">TOTAL PELANGGAN</span>
                        <div class="stat-icon text-primary" style="background:#eaf2ff;">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                    <div class="stat-number">{{ $totalPelanggan }}</div>
                    <small class="text-muted">Pelanggan terdaftar</small>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ route('kendaraan.index') }}" class="stat-link">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="stat-label">TOTAL KENDARAAN</span>
                        <div class="stat-icon text-success" style="background:#e8f8ef;">
                            <i class="bi bi-bicycle"></i>
                        </div>
                    </div>
                    <div class="stat-number">{{ $totalKendaraan }}</div>
                    <small class="text-muted">Kendaraan terdaftar</small>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ route('data-service.index') }}" class="stat-link">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="stat-label">TOTAL SERVICE</span>
                        <div class="stat-icon text-warning" style="background:#fff5df;">
                            <i class="bi bi-tools"></i>
                        </div>
                    </div>
                    <div class="stat-number">{{ $totalService }}</div>
                    <small class="text-muted">Data pengerjaan service</small>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <a href="{{ route('pembayaran-service.index') }}" class="stat-link">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="stat-label">TOTAL PEMBAYARAN</span>
                        <div class="stat-icon text-danger" style="background:#ffeded;">
                            <i class="bi bi-credit-card-fill"></i>
                        </div>
                    </div>
                    <div class="stat-number">{{ $totalPembayaran }}</div>
                    <small class="text-muted">Transaksi tercatat</small>
                </div>
            </a>
        </div>

    </div>

    {{-- AKSES CEPAT --}}
    <div class="content-card mb-4">

        <div class="mb-4">
            <h5 class="section-heading mb-1">Akses Cepat</h5>
            <small class="text-muted">
                Pilih menu untuk mengelola pelayanan bengkel.
            </small>
        </div>

        <div class="row g-3">

            <div class="col-md-6 col-xl-4">
                <a href="{{ route('pelanggan.create') }}" class="quick-card">
                    <div class="quick-icon">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <div>
                        <strong>Tambah Pelanggan</strong>
                        <small>Daftarkan pelanggan baru</small>
                    </div>
                    <i class="bi bi-arrow-up-right ms-auto"></i>
                </a>
            </div>

            <div class="col-md-6 col-xl-4">
                <a href="{{ route('kendaraan.create') }}" class="quick-card">
                    <div class="quick-icon">
                        <i class="bi bi-bicycle"></i>
                    </div>
                    <div>
                        <strong>Tambah Kendaraan</strong>
                        <small>Catat kendaraan pelanggan</small>
                    </div>
                    <i class="bi bi-arrow-up-right ms-auto"></i>
                </a>
            </div>

            <div class="col-md-6 col-xl-4">
                <a href="{{ route('daftar-service.create') }}" class="quick-card">
                    <div class="quick-icon">
                        <i class="bi bi-clipboard-plus"></i>
                    </div>
                    <div>
                        <strong>Daftar Service</strong>
                        <small>Buat pendaftaran service</small>
                    </div>
                    <i class="bi bi-arrow-up-right ms-auto"></i>
                </a>
            </div>

            <div class="col-md-6 col-xl-4">
                <a href="{{ route('data-service.create') }}" class="quick-card">
                    <div class="quick-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <div>
                        <strong>Data Service</strong>
                        <small>Catat pengerjaan mekanik</small>
                    </div>
                    <i class="bi bi-arrow-up-right ms-auto"></i>
                </a>
            </div>

            <div class="col-md-6 col-xl-4">
                <a href="{{ route('pembayaran-service.create') }}" class="quick-card">
                    <div class="quick-icon">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div>
                        <strong>Pembayaran Service</strong>
                        <small>Catat transaksi pembayaran</small>
                    </div>
                    <i class="bi bi-arrow-up-right ms-auto"></i>
                </a>
            </div>

        </div>
    </div>

    {{-- INFORMASI SISTEM --}}
    <div class="content-card">
        <div class="row g-3 align-items-center">

            <div class="col-lg-7">
                <h5 class="section-heading mb-2">
                    <i class="bi bi-info-circle-fill text-primary me-2"></i>
                    Tentang MotoCare
                </h5>

                <p class="text-muted mb-0" style="font-size:13px; line-height:1.8;">
                    MotoCare merupakan sistem informasi pelayanan bengkel
                    motor yang membantu proses pengelolaan pelanggan,
                    kendaraan, pendaftaran service, pengerjaan mekanik,
                    hingga pembayaran dalam satu aplikasi.
                </p>
            </div>

            <div class="col-lg-5">
                <div class="info-box">
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Status Sistem</span>
                        <span class="text-success fw-semibold">
                            <i class="bi bi-circle-fill me-1"></i> Aktif
                        </span>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Database</span>
                        <strong>MotoCare DB</strong>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Versi Aplikasi</span>
                        <strong>1.0.0</strong>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection
