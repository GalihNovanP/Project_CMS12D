@extends('layouts.app')

@section('title', 'Tambah Order')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Order Baru</h2>

    <form method="POST" action="{{ route('order.store') }}" style="line-height: 2;">
        @csrf
        <label>Tanggal Order:
            <input type="date" name="tanggal_order" required>
        </label><br>

        <label>Jumlah Order:
            <input type="number" name="jumlah_order" required>
        </label><br>

        <button type="submit" style="margin-top: 10px;">Tambah</button>
    </form>

    <a href="{{ route('order.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
