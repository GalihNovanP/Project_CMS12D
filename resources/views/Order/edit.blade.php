@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
    <h1>Edit Order</h1>

    <form method="POST" action="{{ route('order.update', $order->id) }}">
        @csrf
        @method('PUT')

        <label>Tanggal Order:</label><br>
        <input type="date" name="tanggal_order" value="{{ $order->tanggal_order }}"><br><br>

        <label>Jumlah Order:</label><br>
        <input type="number" name="jumlah_order" value="{{ $order->jumlah_order }}"><br><br>

        <button style="margin-top: 10px;">Simpan</button>
    </form>

    <br>
    <a href="{{ route('order.show', $order->id) }}">← Kembali ke detail</a>
@endsection
