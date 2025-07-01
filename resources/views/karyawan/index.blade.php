@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Daftar Karyawan</h1>
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary">+ Tambah Karyawan</a>
    </div>


    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($karyawans->isEmpty())
        <div class="alert alert-info">Tidak ada karyawan.</div>
    @else
        <ul class="list-group">
            @foreach($karyawans as $k)
                <li class="list-group-item">
                    <a href="{{ route('karyawan.show', $k->id) }}" class="text-decoration-none">
                        {{ $k->nama_karyawan }} — <small class="text-muted">{{ $k->jabatan_karyawan }}</small>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
