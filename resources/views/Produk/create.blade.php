@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Produk Baru</h2>

    {{-- Tampilkan semua pesan error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('produk.store') }}">
        @csrf

        <div class="mb-3">
            <label for="id_produk" class="form-label">ID Produk</label>
            <input type="text" class="form-control @error('id_produk') is-invalid @enderror" 
                   id="id_produk" name="id_produk" value="{{ old('id_produk') }}" required>
            @error('id_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" 
                   id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}" required>
            @error('nama_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                   id="harga" name="harga" step="0.01" min="0" value="{{ old('harga') }}" required>
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stok') is-invalid @enderror" 
                   id="stok" name="stok" min="0" value="{{ old('stok') }}" required>
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary ms-2">← Kembali ke daftar</a>
    </form>
</div>
@endsection
