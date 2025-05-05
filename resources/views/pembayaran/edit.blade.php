@extends('layouts.app')

@section('content')
<h1>Edit Pembayaran</h1>
<form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>ID Order:</label>
    <input type="number" name="id_order" value="{{ $pembayaran->id_order }}" required><br><br>

    <label>Metode Pembayaran:</label>
    <input type="text" name="metode_pembayaran" value="{{ $pembayaran->metode_pembayaran }}" required><br><br>

    <label>Tanggal Pembayaran:</label>
    <input type="date" name="tanggal_pembayaran" value="{{ $pembayaran->tanggal_pembayaran }}" required><br><br>

    <button type="submit">Update</button>
</form>
@endsection
