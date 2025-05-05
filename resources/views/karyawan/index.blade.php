@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
    <h1>Daftar Karyawan</h1>

    <ul>
        @forelse($karyawans as $k)
            <li>
                <a href="{{ route('karyawan.show', $k->id) }}">{{ $k->nama_karyawan }}</a>
            </li>
        @empty
            <p>Tidak ada karyawan.</p>
        @endforelse
    </ul>

    <a href="{{ route('karyawan.create') }}">+ Tambah Karyawan</a>
@endsection
