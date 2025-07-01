@extends('layouts.app')

@section('title', 'Daftar Order')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Daftar Order</h1>
        <a href="{{ route('order.create') }}" class="btn btn-primary">+ Tambah Order</a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($orders->isEmpty())
        <div class="alert alert-info">Tidak ada order.</div>
    @else
        <div class="list-group">
            @foreach($orders as $order)
                <a href="{{ route('order.show', $order->id) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>ID:</strong> {{ $order->id }}<br>
                            <strong>Tanggal:</strong> {{ $order->tanggal_order }}
                        </div>
                        <div class="text-end">
                            <strong>Jumlah:</strong> {{ $order->jumlah_order }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection
