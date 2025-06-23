@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Produk</h1>

    {{-- Tampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('produk.update', $produk->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" 
                   id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required>
            @error('nama_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" step="0.01" min="0" class="form-control @error('harga') is-invalid @enderror" 
                   id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" required>
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" min="0" class="form-control @error('stok') is-invalid @enderror" 
                   id="stok" name="stok" value="{{ old('stok', $produk->stok) }}" required>
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-secondary ms-2">← Kembali ke detail</a>
    </form>
</div>
@endsection
