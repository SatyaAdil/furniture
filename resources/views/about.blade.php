@extends('layouts.base')

@section('title', 'About Us - Bagus Furniture')

@section('content')
<section>
    <div class="container" style="margin-top: 140px;">
        @if ($content && $content->page_value)
            {!! $content->page_value !!}
        @else
            <div class="alert alert-warning">
                Konten untuk halaman "About Us" belum diatur. Silakan login sebagai admin untuk mengisinya.
            </div>
        @endif
    </div>
</section>
@endsection
