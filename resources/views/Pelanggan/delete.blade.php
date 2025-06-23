@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
<div class="container mt-5">
    <h1 class="text-danger mb-4">Yakin ingin menghapus pelanggan ini?</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $pelanggan->nama }}</h5>
            <p class="card-text">{{ $pelanggan->email }}</p>
        </div>
    </div>

    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger me-2">🗑 Ya, Hapus</button>
    </form>

    <a href="{{ route('pelanggan.show', $pelanggan->id) }}" class="btn btn-secondary">Batal</a>
</div>
@endsection
