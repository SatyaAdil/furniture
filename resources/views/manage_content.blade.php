{{-- resources/views/manage_page.blade.php --}}
@extends('layouts.base')

@section('title', "Manage $page_title")

@section('content')
<div class="container" style="margin-top: 120px;">
    <h1 class="mb-4">Management Konten: {{ $page_title }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="alert alert-info">
        Anda bisa menggunakan tag HTML di sini (misal: <code>&lt;h2&gt;</code>, <code>&lt;p&gt;</code>, <code>&lt;table&gt;</code>, <code>&lt;div class="row"&gt;</code>, dll.) untuk mengatur tata letak.
    </div>

    <form method="POST" action="{{ route('manage_page', ['slug' => $slug]) }}">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Konten HTML</label>
            <textarea class="form-control" id="content" name="content" rows="20">{{ old('content', $content->page_value ?? '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin_dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
    </form>
</div>
@endsection
