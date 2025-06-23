@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Detail Produk</h2>

    <div class="card mb-4" style="max-width: 500px;">
        <div class="card-body">
            <p class="card-text"><strong>Nama Produk:</strong> {{ $produk->nama_produk }}</p>
            <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($produk->harga, 2, ',', '.') }}</p>
            <p class="card-text"><strong>Stok:</strong> {{ $produk->stok }}</p>
        </div>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning">
            ✏ Edit
        </a>

        <a href="{{ route('produk.delete', $produk->id) }}" class="btn btn-danger" 
           onclick="return confirm('Yakin ingin menghapus produk ini?')">
            🗑 Hapus
        </a>

        <a href="{{ route('produk.index') }}" class="btn btn-secondary ms-auto">
            ← Kembali ke daftar
        </a>
    </div>
</div>
@endsection
