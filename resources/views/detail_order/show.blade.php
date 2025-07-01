@extends('layouts.app')

@section('title', 'Detail Detail Order')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Detail Detail Order</h2>

    <div class="card border-primary mb-4" style="max-width: 600px;">
        <div class="card-body">
            <p class="mb-2"><strong>ID Order:</strong> {{ $detail->id_order }}</p>
            <p class="mb-2"><strong>ID Produk:</strong> {{ $detail->id_produk }}</p>
            <p class="mb-2"><strong>Jumlah Produk:</strong> {{ $detail->jumlah_produk }}</p>
            <p class="mb-0"><strong>Harga Produk:</strong> Rp {{ number_format($detail->harga_produk, 2, ',', '.') }}</p>
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('detail_order.edit', $detail->id) }}" class="btn btn-warning">
            ✏ Edit
        </a>

        <a href="{{ route('detail_order.delete', $detail->id) }}" class="btn btn-danger"
           onclick="return confirm('Yakin ingin menghapus detail order ini?')">
            🗑 Hapus
        </a>

        <a href="{{ route('detail_order.index') }}" class="btn btn-secondary ms-auto">
            ← Kembali ke daftar
        </a>
    </div>
</div>
@endsection
