@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Pelanggan Baru</h2>

    <form method="POST" action="{{ route('pelanggan.store') }}" style="line-height: 2;">
        @csrf
        <label>Nama: <input type="text" name="nama" required></label><br>
        <label>Alamat: <input type="text" name="alamat" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <button type="submit" style="margin-top: 10px;">Tambah</button>
    </form>

    <a href="{{ route('pelanggan.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection