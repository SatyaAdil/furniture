@extends('layouts.base')

@section('title')
    {{ $detail->name_product ?? 'Detail Produk' }} - Bagus Furniture
@endsection

@section('content')
<div class="container" style="margin-top: 120px;">
    {{-- Cek apakah produk tersedia --}}
    @if ($detail)
        <div class="row">
            <!-- Gambar Produk -->
            <div class="col-md-7">
                <img src="{{ asset($detail->image_url) }}" class="img-fluid rounded shadow-sm" alt="{{ $detail->name_product }}">
            </div>

            <!-- Informasi Produk -->
            <div class="col-md-5">
                <h1 style="font-weight: 600;">{{ $detail->name_product }}</h1>
                <p class="text-muted">
                    Kategori:
                    <span class="badge bg-secondary">
                        {{ $detail->name_category ?? 'Tidak Ada Kategori' }}
                    </span>
                </p>
                <h2 class="my-4" style="color: #d4af37; font-size: 2.5rem;">
                    Rp. {{ number_format($detail->price, 0, ',', '.') }}
                </h2>

                <div class="card bg-light border-0 mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi</h5>
                        <p class="card-text">
                            Produk unggulan dari Bagus Furniture, dirancang dengan material pilihan untuk daya tahan dan keindahan maksimal. Cocok untuk melengkapi interior modern maupun klasik Anda.
                        </p>
                        <p class="card-text">Stok Tersedia: <strong>{{ $detail->in_stok }}</strong></p>
                    </div>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <a href="https://wa.me/6281327149583?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($detail->name_product) }}"
                       class="btn btn-success btn-lg" target="_blank">
                        Hubungi via WhatsApp untuk Membeli
                    </a>
                </div>
            </div>
        </div>

        <!-- Produk Rekomendasi -->
        <hr class="my-5">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4">Anda Mungkin Juga Suka</h3>
            </div>
            @foreach ($produk as $p)
                <div class="col-6 col-md-3">
                    <div class="card shadow-sm h-100">
                        <a href="{{ route('detail_produk', $p->id) }}" class="text-decoration-none text-dark">
                            <img src="{{ asset($p->image_url) }}" class="card-img-top" alt="{{ $p->name_product }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h6 class="card-title">{{ $p->name_product }}</h6>
                                <p class="card-text fw-bold">
                                    Rp. {{ number_format($p->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        {{-- Jika produk tidak ditemukan --}}
        <div class="alert alert-danger text-center">
            <h2>Produk Tidak Ditemukan</h2>
            <p>Produk yang Anda cari mungkin telah dihapus atau URL tidak valid.</p>
            <a href="{{ route('product.index') }}" class="btn btn-primary">Kembali ke Halaman Produk</a>
        </div>
    @endif
</div>
@endsection
