@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 fw-bold">Detail Pelanggan</h2>

    <div class="card border-primary">
        <div class="card-body">
            <h5 class="card-title">{{ $pelanggan->nama }}</h5>
            <p class="card-text mb-1"><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
            <p class="card-text mb-0"><strong>Email:</strong> {{ $pelanggan->email }}</p>
        </div>
    </div>

    <div class="mt-4 d-flex flex-wrap gap-2">
        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning">
            ✏️ Edit
        </a>

        <a href="{{ route('pelanggan.delete', $pelanggan->id) }}" class="btn btn-danger"
           onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">
            🗑️ Hapus
        </a>

        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary ms-auto">
            ← Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
