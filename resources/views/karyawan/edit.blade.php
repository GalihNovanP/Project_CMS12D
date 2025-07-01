@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Karyawan</h2>

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

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror"
                   id="nama_karyawan" name="nama_karyawan" value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}" required>
            @error('nama_karyawan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jabatan_karyawan" class="form-label">Jabatan</label>
            <input type="text" class="form-control @error('jabatan_karyawan') is-invalid @enderror"
                   id="jabatan_karyawan" name="jabatan_karyawan" value="{{ old('jabatan_karyawan', $karyawan->jabatan_karyawan) }}" required>
            @error('jabatan_karyawan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('karyawan.show', $karyawan->id) }}" class="btn btn-secondary ms-2">← Batal</a>
    </form>
</div>
@endsection
