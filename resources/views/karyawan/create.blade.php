@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('content')
    <h2>Tambah Karyawan</h2>

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama_karyawan" required><br><br>

        <label>Jabatan:</label>
        <input type="text" name="jabatan_karyawan" required><br><br>

        <button type="submit">Simpan</button>
    </form><br>

    <a href="{{ route('karyawan.index') }}">← Kembali</a>
@endsection
