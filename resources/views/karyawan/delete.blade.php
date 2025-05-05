@extends('layouts.app')

@section('title', 'Hapus Karyawan')

@section('content')
    <h2>Hapus Karyawan</h2>

    <p>Yakin ingin menghapus <strong>{{ $karyawan->nama_karyawan }}</strong>?</p>

    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Ya, Hapus</button>
        <a href="{{ route('karyawan.index') }}">Batal</a>
    </form>
@endsection
