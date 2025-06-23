@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
<div class="container mt-5">
    <h1 class="text-danger mb-4">Yakin ingin menghapus produk ini?</h1>

    <div class="card mb-4" style="max-width: 500px;">
        <div class="card-body">
            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
            <p class="card-text">Harga: <strong>Rp{{ number_format($produk->harga, 2, ',', '.') }}</strong></p>
            <p class="card-text">Stok: <strong>{{ $produk->stok }}</strong></p>
        </div>
    </div>

    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger me-2" onclick="return confirm('Yakin ingin menghapus produk ini?')">
            🗑 Ya, Hapus
        </button>
    </form>

    <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-secondary">Batal</a>
</div>
@endsection
