@extends('layouts.app')

@section('title', 'Detail Order')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 fw-bold">Detail Order</h2>

    <div class="card border-primary mb-4" style="max-width: 500px;">
        <div class="card-body">
            <p class="card-text mb-2"><strong>ID Order:</strong> {{ $order->id }}</p>
            <p class="card-text mb-2"><strong>Tanggal Order:</strong> {{ $order->tanggal_order }}</p>
            <p class="card-text mb-0"><strong>Jumlah Order:</strong> {{ $order->jumlah_order }}</p>
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <a href="{{ route('order.edit', $order->id) }}" class="btn btn-warning">
            ✏ Edit
        </a>

        <a href="{{ route('order.delete', $order->id) }}" class="btn btn-danger"
           onclick="return confirm('Yakin ingin menghapus order ini?')">
            🗑 Hapus
        </a>

        <a href="{{ route('order.index') }}" class="btn btn-secondary ms-auto">
            ← Kembali ke daftar
        </a>
    </div>
</div>
@endsection
