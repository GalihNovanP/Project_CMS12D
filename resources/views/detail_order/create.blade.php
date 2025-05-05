@extends('layouts.app')

@section('title', 'Tambah Detail Order')

@section('content')
    <h2>Tambah Detail Order</h2>

    <form method="POST" action="{{ route('detail_order.store') }}">
        @csrf

        <label>ID Order:</label>
        <input type="number" name="id_order" required><br><br>

        <label>ID Produk:</label>
        <input type="number" name="id_produk" required><br><br>

        <label>Jumlah Produk:</label>
        <input type="number" name="jumlah_produk" required><br><br>

        <label>Harga Produk:</label>
        <input type="text" name="harga_produk" required><br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('detail_order.index') }}">← Kembali ke daftar</a>
@endsection
