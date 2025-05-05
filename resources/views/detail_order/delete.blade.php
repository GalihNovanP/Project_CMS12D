@extends('layouts.app')

@section('title', 'Hapus Detail Order')

@section('content')
    <h2>Hapus Detail Order</h2>

    <p>Yakin ingin menghapus detail order berikut?</p>

    <ul>
        <li><strong>ID Order:</strong> {{ $detail->id_order }}</li>
        <li><strong>ID Produk:</strong> {{ $detail->id_produk }}</li>
        <li><strong>Jumlah Produk:</strong> {{ $detail->jumlah_produk }}</li>
        <li><strong>Harga Produk:</strong> Rp {{ number_format($detail->harga_produk, 2, ',', '.') }}</li>
    </ul>

    <form method="POST" action="{{ route('detail_order.destroy', $detail->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">🗑 Hapus</button>
    </form>

    <br>
    <a href="{{ route('detail_order.index') }}">← Batal</a>
@endsection
