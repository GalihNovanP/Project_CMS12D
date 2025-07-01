@extends('layouts.app')

@section('title', 'Daftar Detail Order')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Daftar Detail Order</h1>
        <a href="{{ route('detail_order.create') }}" class="btn btn-primary">+ Tambah Detail Order</a>
    </div>
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($details->isEmpty())
        <div class="alert alert-info">Tidak ada detail order.</div>
    @else
        <div class="list-group">
            @foreach($details as $detail)
                <a href="{{ route('detail_order.show', $detail->id) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Order #{{ $detail->id_order }}</strong><br>
                            Produk #{{ $detail->id_produk }}
                        </div>
                        <div class="text-end">
                            {{ $detail->jumlah_produk }} item<br>
                            <small>Rp {{ number_format($detail->harga_produk, 2, ',', '.') }}</small>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
