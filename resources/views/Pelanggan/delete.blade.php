@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus pelanggan ini?</h1>

    <p><strong>{{ $pelanggan->nama }}</strong></p>
    <p>{{ $pelanggan->email }}</p>

    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('pelanggan.show', $pelanggan->id) }}">Batal</a>
@endsection