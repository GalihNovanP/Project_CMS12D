@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus order ini?</h1>

    <p><strong>Tanggal Order:</strong> {{ $order->tanggal_order }}</p>
    <p><strong>Jumlah Order:</strong> {{ $order->jumlah_order }}</p>

    <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('order.show', $order->id) }}">Batal</a>
@endsection
