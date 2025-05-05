@extends('layouts.app')

@section('title', 'Detail Karyawan')

@section('content')
    <h2>Detail Karyawan</h2>

    <p><strong>Nama:</strong> {{ $karyawan->nama_karyawan }}</p>
    <p><strong>Jabatan:</strong> {{ $karyawan->jabatan_karyawan }}</p>

    <a href="{{ route('karyawan.edit', $karyawan->id) }}">✏ Edit</a> |
    <a href="{{ route('karyawan.delete', $karyawan->id) }}">🗑 Hapus</a>
    <br><br>
    <a href="{{ route('karyawan.index') }}">← Kembali</a>
@endsection
