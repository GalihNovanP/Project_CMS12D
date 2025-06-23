@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Detail Pelanggan</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $pelanggan->nama }}</p>
            <p><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
            <p><strong>Email:</strong> {{ $pelanggan->email }}</p>
        </div>
    </div>

    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning">
            ✏ Edit
        </a>

        <a href="{{ route('pelanggan.delete', $pelanggan->id) }}" class="btn btn-danger" 
           onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">
            🗑 Hapus
        </a>

        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary ms-auto">
            ← Kembali ke daftar
        </a>
    </div>
</div>
@endsection
