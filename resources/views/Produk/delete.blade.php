@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Produk')

@section('content')
<div class="container mt-5">
    <h2 class="text-danger mb-4">Konfirmasi Penghapusan Produk</h2>

    <div class="alert alert-warning">
        <strong>Perhatian!</strong> Anda akan menghapus produk berikut secara permanen:
    </div>

    <div class="card mb-4 border-danger" style="max-width: 500px;">
        <div class="card-body">
            <h5 class="card-title mb-1"><strong>{{ $produk->nama_produk }}</strong></h5>
            <p class="card-text mb-1">Harga: <strong>Rp{{ number_format($produk->harga, 0, ',', '.') }}</strong></p>
            <p class="card-text mb-0">Stok: <strong>{{ $produk->stok }}</strong></p>
        </div>
    </div>

    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger me-2">
            🗑 Ya, Hapus
        </button>
    </form>

    <a href="{{ route('produk.index') }}" class="btn btn-secondary">← Batal</a>
</div>
@endsection
