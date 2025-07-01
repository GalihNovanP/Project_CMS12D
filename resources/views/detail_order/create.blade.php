@extends('layouts.app')

@section('title', 'Tambah Detail Order')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Tambah Detail Order</h2>

    {{-- Tampilkan error validasi jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('detail_order.store') }}">
        @csrf

        <div class="mb-3">
            <label for="id_order" class="form-label">ID Order</label>
            <input type="number" class="form-control @error('id_order') is-invalid @enderror"
                   id="id_order" name="id_order" value="{{ old('id_order') }}" required>
            @error('id_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_produk" class="form-label">ID Produk</label>
            <input type="number" class="form-control @error('id_produk') is-invalid @enderror"
                   id="id_produk" name="id_produk" value="{{ old('id_produk') }}" required>
            @error('id_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jumlah_produk" class="form-label">Jumlah Produk</label>
            <input type="number" class="form-control @error('jumlah_produk') is-invalid @enderror"
                   id="jumlah_produk" name="jumlah_produk" value="{{ old('jumlah_produk') }}" min="1" required>
            @error('jumlah_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga_produk" class="form-label">Harga Produk</label>
            <input type="text" class="form-control @error('harga_produk') is-invalid @enderror"
                   id="harga_produk" name="harga_produk" value="{{ old('harga_produk') }}" required>
            @error('harga_produk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('detail_order.index') }}" class="btn btn-secondary ms-2">← Kembali ke daftar</a>
    </form>
</div>
@endsection
