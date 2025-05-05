@extends('layouts.app')

@section('content')
<h1>Tambah Pembayaran</h1>
<form action="{{ route('pembayaran.store') }}" method="POST">
    @csrf
    <label>ID Order:</label>
    <input type="number" name="id_order" required><br><br>

    <label>Metode Pembayaran:</label>
    <input type="text" name="metode_pembayaran" required><br><br>

    <label>Tanggal Pembayaran:</label>
    <input type="date" name="tanggal_pembayaran" required><br><br>

    <button type="submit">Simpan</button>
</form>
@endsection
