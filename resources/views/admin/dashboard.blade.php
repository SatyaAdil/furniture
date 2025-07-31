@extends('layouts.base')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container" style="margin-top: 120px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-0">Admin Dashboard</h1>
            <p class="text-muted">Selamat datang, <strong>{{ session('username') }}</strong>.</p>
        </div>
        <div>
            <!-- Tombol Aksi Cepat -->
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-lg">Tambah Produk Baru</a>
        </div>
    </div>

    <!-- Kartu Statistik -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Produk</h5>
                    <p class="card-text fs-1 fw-bold">{{ $stats['total_products'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Kategori</h5>
                    <p class="card-text fs-1 fw-bold">{{ $stats['total_categories'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Pengguna</h5>
                    <p class="card-text fs-1 fw-bold">{{ $stats['total_users'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Panel Navigasi Lengkap -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Menu Manajemen
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.product.create') }}" class="list-group-item list-group-item-action"><strong>Management Produk</strong></a>
                    <a href="{{ route('manage_home') }}" class="list-group-item list-group-item-action">Management Konten Halaman Utama</a>
                    <a href="{{ route('manage_about') }}" class="list-group-item list-group-item-action">Management Konten Halaman About</a>
                    <a href="{{ route('manage_page', ['slug' => 'service']) }}" class="list-group-item list-group-item-action">Management Konten Halaman Layanan</a>
                    <a href="{{ route('manage_footer') }}" class="list-group-item list-group-item-action">Management Konten Footer</a>
                </div>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    5 Produk Terakhir Ditambahkan
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($recent_products as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $product->name_product }}
                            <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="badge bg-secondary rounded-pill text-decoration-none">Edit</a>
                        </li>
                    @empty
                        <li class="list-group-item">Belum ada produk.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
