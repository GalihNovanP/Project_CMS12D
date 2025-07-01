@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Order')

@section('content')
<div class="container mt-5">
    <h2 class="text-danger mb-4">Konfirmasi Penghapusan Order</h2>

    <div class="alert alert-warning">
        <strong>Perhatian!</strong> Anda akan menghapus data order berikut secara permanen:
    </div>

    <div class="card mb-4 border-danger" style="max-width: 500px;">
        <div class="card-body">
            <p class="card-text mb-2"><strong>Tanggal Order:</strong> {{ $order->tanggal_order }}</p>
            <p class="card-text mb-0"><strong>Jumlah Order:</strong> {{ $order->jumlah_order }}</p>
        </div>
    </div>

    <form action="{{ route('order.destroy', $order->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger me-2">
            🗑 Ya, Hapus
        </button>
    </form>

    <a href="{{ route('order.index') }}" class="btn btn-secondary">← Batal</a>
</div>
@endsection
