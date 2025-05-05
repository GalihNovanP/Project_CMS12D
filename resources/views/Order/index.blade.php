@extends('layouts.app')

@section('title', 'Daftar Order')

@section('content')
    <h1>Daftar Order</h1>

    <ul>
        @forelse($orders as $order)
            <li>
                <a href="/order/{{ $order->id }}">
                    ID Order: {{ $order->id }}<br>
                    Tanggal Order: {{ $order->tanggal_order }}<br>
                    Jumlah Order: {{ $order->jumlah_order }}
                </a>
            </li>
        @empty
            <p>Tidak ada order.</p>
        @endforelse
    </ul>

    <a href="/order/create" style="display: inline-block; margin-top: 20px;">+ Tambah Order</a>
    <br><br>
@endsection
