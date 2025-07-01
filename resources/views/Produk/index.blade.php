@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Daftar Produk</h1>
        <a href="{{ route('produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    </div>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

    @if($produks->isEmpty())
        <div class="alert alert-info">Tidak ada produk.</div>
    @else
        <ul class="list-group">
            @foreach($produks as $p)
                <li class="list-group-item">
                    <a href="{{ route('produk.show', $p->id) }}" class="text-decoration-none">
                        {{ $p->nama_produk }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
