@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Detail Order')

@section('content')
<div class="container mt-5">
    <h2 class="text-danger mb-4">Konfirmasi Penghapusan Detail Order</h2>

    <div class="alert alert-warning">
        <strong>Perhatian!</strong> Anda akan menghapus data berikut secara permanen:
    </div>

    <div class="card mb-4 border-danger" style="max-width: 600px;">
        <div class="card-body">
            <p class="mb-2"><strong>ID Order:</strong> {{ $detail->id_order }}</p>
            <p class="mb-2"><strong>ID Produk:</strong> {{ $detail->id_produk }}</p>
            <p class="mb-2"><strong>Jumlah Produk:</strong> {{ $detail->jumlah_produk }}</p>
            <p class="mb-0"><strong>Harga Produk:</strong> Rp {{ number_format($detail->harga_produk, 2, ',', '.') }}</p>
        </div>
    </div>

    <form method="POST" action="{{ route('detail_order.destroy', $detail->id) }}" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger me-2" onclick="return confirm('Yakin ingin menghapus detail order ini?')">
            🗑 Ya, Hapus
        </button>
    </form>

    <a href="{{ route('detail_order.index') }}" class="btn btn-secondary">← Batal</a>
</div>
@endsection
