@extends('layouts.app')

@section('title', 'Daftar Pembayaran')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Pembayaran</h2>
        <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">+ Tambah Pembayaran</a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($pembayarans->isEmpty())
        <div class="alert alert-info">Tidak ada data pembayaran.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-light">
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
                            <td>{{ \Carbon\Carbon::parse($p->tanggal_pembayaran)->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('pembayaran.show', $p->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                <a href="{{ route('pembayaran.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('pembayaran.delete', $p->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
