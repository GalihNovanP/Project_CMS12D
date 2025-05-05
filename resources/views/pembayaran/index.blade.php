@extends('layouts.app')

@section('content')
<h1>Daftar Pembayaran</h1>
<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Order</th>
            <th>Metode</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembayarans as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->id_order }}</td>
            <td>{{ $p->metode_pembayaran }}</td>
            <td>{{ $p->tanggal_pembayaran }}</td>
            <td>
                <a href="{{ route('pembayaran.show', $p->id) }}">Lihat</a> |
                <a href="{{ route('pembayaran.edit', $p->id) }}">Edit</a> |
                <a href="{{ route('pembayaran.delete', $p->id) }}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table><br>
<a href="{{ route('pembayaran.create') }}">+ Tambah Pembayaran</a>
@endsection
