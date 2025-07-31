@extends('layouts.base')

@section('title', 'Edit Product')

@section('content')
<div class="container" style="margin-top: 120px;">
    <div class="card p-4 shadow-sm">
        <h2 class="mb-4">Edit Produk: {{ $produk->name_product }}</h2>

        <form action="{{ route('admin.product.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name_product" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="name_product" value="{{ $produk->name_product }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image_url" class="form-label">URL Gambar</label>
                    <input type="text" class="form-control" name="image_url" value="{{ $produk->image_url }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="price" value="{{ $produk->price }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="id_category" class="form-label">Kategori</label>
                    <select class="form-select" name="id_category" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $cat)
                            <option value="{{ $cat->id }}" @if($cat->id == $produk->id_category) selected @endif>
                                {{ $cat->name_category ?? 'Kategori Tanpa Nama' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="in_stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="in_stok" value="{{ $produk->in_stok }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Produk</button>
            <a href="{{ route('admin.product.create') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
