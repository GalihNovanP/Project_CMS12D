@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Pembayaran')

@section('content')
<div class="container mt-5">
    <h2 class="text-danger mb-4">Yakin ingin menghapus pembayaran ini?</h2>

    <div class="card mb-4" style="max-width: 500px;">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $pembayaran->id }}</p>
            <p><strong>ID Order:</strong> {{ $pembayaran->id_order }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $pembayaran->metode_pembayaran }}</p>
            <p><strong>Tanggal Pembayaran:</strong> {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d-m-Y') }}</p>
        </div>
    </div>

    <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger me-2" onclick="return confirm('Yakin ingin menghapus pembayaran ini?')">
            🗑 Ya, Hapus
        </button>
    </form>

    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">← Batal</a>
</div>
@endsection
