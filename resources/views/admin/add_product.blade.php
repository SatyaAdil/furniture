@extends('layouts.base')

@section('title', 'Manage Products')

@section('content')
<div class="container" style="margin-top: 120px;">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Form Tambah Produk Baru --}}
    <div class="card p-4 shadow-sm mb-5">
        <h2 class="mb-4">Tambah Produk Baru</h2>
        <form action="{{ route('admin.product.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name_product" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="name_product" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image_url" class="form-label">URL Gambar</label>
                    <input type="text" class="form-control" name="image_url" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="price" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-select" name="category" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $cat)
                            <option value="{{ $cat->id_category }}">{{ $cat->name_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="in_stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="in_stok" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Produk</button>
        </form>
    </div>

    {{-- Tabel Produk --}}
    <hr class="my-5">
    <h2 class="mb-4">Daftar Produk</h2>
    <div class="table-responsive">
        <table id="productTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produk as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name_product }}</td>
                        <td>{{ $p->name_category }}</td>
                        <td>Rp. {{ number_format($p->price, 0, ',', '.') }}</td>
                        <td>{{ $p->in_stok }}</td>
                        <td>
                            <a href="{{ route('admin.product.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.product.delete', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk \'{{ $p->name_product }}\'?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada produk. Silakan tambahkan produk baru di atas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
