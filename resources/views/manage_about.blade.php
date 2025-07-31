{{-- resources/views/manage_about.blade.php --}}
@extends('layouts.base')

@section('title', 'Management About')

@section('content')
<div class="container" style="margin-top: 120px;">
    <h1 class="mb-4">Management Halaman About</h1>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('manage_about') }}">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Konten HTML untuk Halaman About</label>
            <textarea class="form-control" id="content" name="content" rows="15">{{ old('content', $content->page_value ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
