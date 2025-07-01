@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Data Order</h2>

    {{-- Tampilkan pesan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('order.update', $order->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal_order" class="form-label">Tanggal Order</label>
            <input type="date" class="form-control @error('tanggal_order') is-invalid @enderror"
                   id="tanggal_order" name="tanggal_order" value="{{ old('tanggal_order', $order->tanggal_order) }}" required>
            @error('tanggal_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jumlah_order" class="form-label">Jumlah Order</label>
            <input type="number" class="form-control @error('jumlah_order') is-invalid @enderror"
                   id="jumlah_order" name="jumlah_order" value="{{ old('jumlah_order', $order->jumlah_order) }}" min="1" required>
            @error('jumlah_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('order.show', $order->id) }}" class="btn btn-secondary ms-2">← Kembali ke detail</a>
    </form>
</div>
@endsection
