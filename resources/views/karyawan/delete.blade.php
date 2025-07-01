@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Karyawan')

@section('content')
<div class="container mt-5">
    <h2 class="text-danger mb-4">Yakin ingin menghapus karyawan ini?</h2>

    <div class="card mb-4" style="max-width: 500px;">
        <div class="card-body">
            <h5 class="card-title">{{ $karyawan->nama_karyawan }}</h5>
            <p class="card-text"><strong>Jabatan:</strong> {{ $karyawan->jabatan_karyawan }}</p>
        </div>
    </div>

    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger me-2" onclick="return confirm('Yakin ingin menghapus karyawan ini?')">
            🗑 Ya, Hapus
        </button>
    </form>

    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">← Batal</a>
</div>
@endsection
