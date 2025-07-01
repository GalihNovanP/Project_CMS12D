@extends('layouts.app')

@section('title', 'Detail Pembayaran')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Detail Pembayaran</h2>

    <div class="card" style="max-width: 500px;">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $pembayaran->id }}</p>
            <p><strong>ID Order:</strong> {{ $pembayaran->id_order }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $pembayaran->metode_pembayaran }}</p>
            <p><strong>Tanggal Pembayaran:</strong> {{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d-m-Y') }}</p>
        </div>
    </div>

    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-warning">
            ✏ Edit
        </a>

        <a href="{{ route('pembayaran.delete', $pembayaran->id) }}" class="btn btn-danger"
           onclick="return confirm('Yakin ingin menghapus pembayaran ini?')">
            🗑 Hapus
        </a>

        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary ms-auto">
            ← Kembali ke daftar
        </a>
    </div>
</div>
@endsection
