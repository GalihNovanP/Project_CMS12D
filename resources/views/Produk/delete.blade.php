@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus produk ini?</h1>

    <p><strong>{{ $produk->nama_produk }}</strong></p>
    <p>Harga: Rp{{ number_format($produk->harga, 2, ',', '.') }}</p>
    <p>Stok: {{ $produk->stok }}</p>

    <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('produk.show', $produk->id) }}">Batal</a>
@endsection
