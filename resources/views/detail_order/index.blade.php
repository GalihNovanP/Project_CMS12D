@extends('layouts.app')

@section('title', 'Daftar Detail Order')

@section('content')
    <h1>Daftar Detail Order</h1>

    <ul>
        @forelse($details as $detail)
            <li>
                <a href="{{ route('detail_order.show', $detail->id) }}">
                    Order #{{ $detail->id_order }} - Produk #{{ $detail->id_produk }} ({{ $detail->jumlah_produk }} item)
                </a>
            </li>
        @empty
            <p>Tidak ada detail order.</p>
        @endforelse
    </ul>

    <a href="{{ route('detail_order.create') }}" style="display: inline-block; margin-top: 20px;">+ Tambah Detail Order</a>
@endsection
