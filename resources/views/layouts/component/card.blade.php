{{-- resources/views/layouts/component/card.blade.php --}}
<div class="container" style="margin-top: 50px;">
    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm h-100">
                    <a href="{{ route('detail_produk', ['id' => $product->id]) }}" style="text-decoration: none; color: black;">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name_product }}" style="height: 220px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title" style="font-size: 1rem;">{{ $product->name_product }}</h5>
                            <p class="card-text mb-1">Stok: {{ $product->in_stok }}</p>
                            
                            @if($product->category && is_object($product->category))
                                <small class="text-muted mb-2">Kategori: {{ $product->category->name_category }}</small>
                            @endif
                            
                            <p class="fw-bold mt-auto mb-0">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Tidak ada produk tersedia.
                </div>
            </div>
        @endforelse
    </div>
</div>
