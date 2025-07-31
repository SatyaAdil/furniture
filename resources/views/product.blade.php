@extends('layouts.base')

@section('title', 'Produk - Bagus Furniture')

@section('content')
<section>
    <div class="container" style="margin-top: 150px;">
        <div class="row mb-3">
            <div class="col d-flex align-items-center justify-content-between">
                <h3 class="text-dark mb-0">Semua Produk</h3>
                
                {{-- Tombol ini hanya muncul jika admin yang login --}}
                @if(session('loggedin') && session('role') === 'admin')
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary" role="button">Tambah Produk</a>
                @endif
            </div>
        </div>
        <hr>
    </div>

    {{-- Memanggil file card.blade.php untuk menampilkan semua produk --}}
    @include('layouts.component.card')
</section>
@endsection
