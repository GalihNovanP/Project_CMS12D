@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Daftar Pelanggan</h1>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">+ Tambah Pelanggan</a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($pelanggans->isEmpty())
        <div class="alert alert-info">Tidak ada pelanggan.</div>
    @else
        <ul class="list-group">
            @foreach($pelanggans as $p)
                <li class="list-group-item">
                    <a href="{{ route('pelanggan.show', $p->id) }}" class="text-decoration-none">
                        {{ $p->nama }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
