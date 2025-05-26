@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Produk Baru</h2>

    {{-- Tampilkan semua pesan error --}}
    @if ($errors->any())
        <div style="color: red; margin-bottom: 16px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('produk.store') }}" style="line-height: 2;">
        @csrf

        <label>
            Nama Produk:
            <input type="text" name="nama_produk" value="{{ old('nama_produk') }}">
            @error('nama_produk')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </label><br>

        <label>
            Harga:
            <input type="number" name="harga" step="0.01" min="0" value="{{ old('harga') }}">
            @error('harga')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </label><br>

        <label>
            Stok:
            <input type="number" name="stok" min="0" value="{{ old('stok') }}">
            @error('stok')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </label><br>

        <button type="submit" style="margin-top: 10px;">Tambah</button>
    </form>

    <a href="{{ route('produk.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
