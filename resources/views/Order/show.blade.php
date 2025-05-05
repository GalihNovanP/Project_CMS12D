@extends('layouts.app')

@section('title', 'Detail Order')

@section('content')
    <h2>Detail Order</h2>

    <p><strong>ID Order:</strong> {{ $order->id }}</p>
    <p><strong>Tanggal Order:</strong> {{ $order->tanggal_order }}</p>
    <p><strong>Jumlah Order:</strong> {{ $order->jumlah_order }}</p>

    <br>

    <a href="{{ route('order.edit', $order->id) }}">✏ Edit</a> |
    <a href="{{ route('order.delete', $order->id) }}">🗑 Hapus</a>

    <br><br>

    <a href="{{ route('order.index') }}">← Kembali ke daftar</a>
@endsection
