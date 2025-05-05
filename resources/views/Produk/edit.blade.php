@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <h1>Edit Produk</h1>

    <form method="POST" action="{{ route('produk.update', $produk->id) }}">
        @csrf
        @method('PUT')

        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}"><br><br>

        <label>Harga:</label><br>
        <input type="number" step="0.01" name="harga" value="{{ $produk->harga }}"><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="{{ $produk->stok }}"><br><br>

        <button style="margin-top: 10px;">Simpan</button>
    </form>

    <br>
    <a href="{{ route('produk.show', $produk->id) }}">← Kembali ke detail</a>
@endsection
