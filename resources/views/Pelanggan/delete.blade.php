@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
<div class="container mt-5">
    <h2 class="text-danger mb-4">Konfirmasi Penghapusan Pelanggan</h2>

    <div class="alert alert-warning">
        <strong>Perhatian!</strong> Anda akan menghapus data pelanggan berikut secara permanen:
    </div>

    <div class="card mb-4 border-danger">
        <div class="card-body">
            <h5 class="card-title mb-1"><strong>Nama:</strong> {{ $pelanggan->nama }}</h5>
            <p class="card-text mb-1"><strong>Email:</strong> {{ $pelanggan->email }}</p>
            <p class="card-text mb-0"><strong>Alamat:</strong> {{ $pelanggan->alamat }}</p>
        </div>
    </div>

    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger me-2">
            🗑 Ya, Hapus
        </button>
    </form>

    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">← Batal</a>
</div>
@endsection
