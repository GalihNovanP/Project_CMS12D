@extends('layouts.app')

@section('title', 'Detail Karyawan')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Detail Karyawan</h2>

    <div class="card mb-4" style="max-width: 500px;">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $karyawan->nama_karyawan }}</p>
            <p><strong>Jabatan:</strong> {{ $karyawan->jabatan_karyawan }}</p>
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning">
            ✏ Edit
        </a>

        <a href="{{ route('karyawan.delete', $karyawan->id) }}" class="btn btn-danger"
           onclick="return confirm('Yakin ingin menghapus karyawan ini?')">
            🗑 Hapus
        </a>

        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary ms-auto">
            ← Kembali ke daftar
        </a>
    </div>
</div>
@endsection
