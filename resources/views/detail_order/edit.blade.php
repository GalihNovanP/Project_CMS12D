@extends('layouts.app')

@section('title', 'Edit Detail Order')

@section('content')
    <h2>Edit Detail Order</h2>

    <form method="POST" action="{{ route('detail_order.update', $detail->id) }}">
        @csrf
        @method('PUT')

        <label>ID Order:</label>
        <input type="number" name="id_order" value="{{ $detail->id_order }}" required><br><br>

        <label>ID Produk:</label>
        <input type="number" name="id_produk" value="{{ $detail->id_produk }}" required><br><br>

        <label>Jumlah Produk:</label>
        <input type="number" name="jumlah_produk" value="{{ $detail->jumlah_produk }}" required><br><br>

        <label>Harga Produk:</label>
        <input type="text" name="harga_produk" value="{{ $detail->harga_produk }}" required><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('detail_order.show', $detail->id) }}">← Batal</a>
@endsection
