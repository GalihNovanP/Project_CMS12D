@extends('layouts.app')

@section('content')
<h1>Detail Pembayaran</h1>
<p><strong>ID:</strong> {{ $pembayaran->id }}</p>
<p><strong>ID Order:</strong> {{ $pembayaran->id_order }}</p>
<p><strong>Metode:</strong> {{ $pembayaran->metode_pembayaran }}</p>
<p><strong>Tanggal:</strong> {{ $pembayaran->tanggal_pembayaran }}</p>

<a href="{{ route('pembayaran.index') }}">Kembali</a>
@endsection
