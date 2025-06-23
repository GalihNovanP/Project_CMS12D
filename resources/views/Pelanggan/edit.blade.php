@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Pelanggan</h1>

    <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelanggan->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pelanggan->alamat }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $pelanggan->email }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pelanggan.show', $pelanggan->id) }}" class="btn btn-secondary ms-2">← Kembali ke detail</a>
    </form>
</div>
@endsection
