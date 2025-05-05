@extends('layouts.app')

@section('content')
<h1>Hapus Pembayaran</h1>
<p>Apakah Anda yakin ingin menghapus pembayaran ini?</p>
<ul>
    <li>ID: {{ $pembayaran->id }}</li>
    <li>ID Order: {{ $pembayaran->id_order }}</li>
    <li>Metode: {{ $pembayaran->metode_pembayaran }}</li>
    <li>Tanggal: {{ $pembayaran->tanggal_pembayaran }}</li>
</ul>

<form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, Hapus</button>
    <a href="{{ route('pembayaran.index') }}">Batal</a>
</form>
@endsection
