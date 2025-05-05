@extends('layouts.app')

@section('title', 'Detail Detail Order')

@section('content')
    <h2>Detail Detail Order</h2>

    <p><strong>ID Order:</strong> {{ $detail->id_order }}</p>
    <p><strong>ID Produk:</strong> {{ $detail->id_produk }}</p>
    <p><strong>Jumlah Produk:</strong> {{ $detail->jumlah_produk }}</p>
    <p><strong>Harga Produk:</strong> Rp {{ number_format($detail->harga_produk, 2, ',', '.') }}</p>

    <br>

    <a href="{{ route('detail_order.edit', $detail->id) }}">✏ Edit</a> |
    <a href="{{ route('detail_order.delete', $detail->id) }}">🗑 Hapus</a>

    <br><br>
    <a href="{{ route('detail_order.index') }}">← Kembali ke daftar</a>
@endsection
