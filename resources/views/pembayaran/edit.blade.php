@extends('layouts.app')

@section('title', 'Edit Pembayaran')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Pembayaran</h2>

    {{-- Tampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_order" class="form-label">ID Order</label>
            <input type="number" class="form-control @error('id_order') is-invalid @enderror"
                   id="id_order" name="id_order" value="{{ old('id_order', $pembayaran->id_order) }}" required>
            @error('id_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <input type="text" class="form-control @error('metode_pembayaran') is-invalid @enderror"
                   id="metode_pembayaran" name="metode_pembayaran" value="{{ old('metode_pembayaran', $pembayaran->metode_pembayaran) }}" required>
            @error('metode_pembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
            <input type="date" class="form-control @error('tanggal_pembayaran') is-invalid @enderror"
                   id="tanggal_pembayaran" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran', $pembayaran->tanggal_pembayaran) }}" required>
            @error('tanggal_pembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
    </form>
</div>
@endsection
