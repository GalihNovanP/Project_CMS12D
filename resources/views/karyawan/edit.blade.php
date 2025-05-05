@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('content')
    <h2>Edit Karyawan</h2>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}" required><br>

        <label>Jabatan:</label>
        <input type="text" name="jabatan_karyawan" value="{{ $karyawan->jabatan_karyawan }}" required><br>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('karyawan.show', $karyawan->id) }}">← Batal</a>
@endsection
