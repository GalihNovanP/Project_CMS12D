@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
    <h1>Edit Pelanggan</h1>

    <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $pelanggan->nama }}"><br><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" value="{{ $pelanggan->alamat }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $pelanggan->email }}"><br><br>

        <button style="margin-top: 10px;">Simpan</button>
    </form>

    <br>
    <a href="{{ route('pelanggan.show', $pelanggan->id) }}">← Kembali ke detail</a>
@endsection