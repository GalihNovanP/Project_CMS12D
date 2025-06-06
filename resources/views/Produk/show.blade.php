@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
    <h2>Detail Produk</h2>

    <p><strong>Nama Produk:</strong> {{ $produk->nama_produk }}</p>
    <p><strong>Harga:</strong> Rp{{ number_format($produk->harga, 2, ',', '.') }}</p>
    <p><strong>Stok:</strong> {{ $produk->stok }}</p>

    <br>

    <a href="{{ route('produk.edit', $produk->id) }}">✏ Edit</a> |
    <a href="{{ route('produk.delete', $produk->id) }}">🗑 Hapus</a>

    <br><br>

    <a href="{{ route('produk.index') }}">← Kembali ke daftar</a>
@endsection
