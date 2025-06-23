@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Daftar Pelanggan</h1>
        <a href="/" class="btn btn-outline-primary">Home</a>
    </div>

    <ul class="list-group mb-4">
        @forelse($pelanggans as $p)
            <li class="list-group-item">
                <a href="/pelanggan/{{ $p->id }}" class="text-decoration-none">
                    {{ $p->nama }}
                </a>
            </li>
        @empty
            <li class="list-group-item text-muted">Tidak ada pelanggan.</li>
        @endforelse
    </ul>

    <a href="/pelanggan/create" class="btn btn-primary">+ Tambah Pelanggan</a>
</div>
@endsection
