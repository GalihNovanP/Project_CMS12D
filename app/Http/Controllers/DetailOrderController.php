<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;

class DetailOrderController extends Controller
{
    // Menampilkan daftar semua detail order
    public function index()
    {
        return view('detail_order.index', [
            'details' => DetailOrder::all()
        ]);
    }

    // Menampilkan form tambah detail order
    public function create()
    {
        return view('detail_order.create');
    }

    // Menyimpan detail order baru
    public function store(Request $request)
    {
        $request->validate([
            'id_order' => 'required|integer',
            'id_produk' => 'required|integer',
            'jumlah_produk' => 'required|integer',
            'harga_produk' => 'required|numeric',
        ]);

        DetailOrder::create([
            'id_order' => $request->input('id_order'),
            'id_produk' => $request->input('id_produk'),
            'jumlah_produk' => $request->input('jumlah_produk'),
            'harga_produk' => $request->input('harga_produk'),
        ]);

        return redirect()->route('detail_order.index');
    }

    // Menampilkan detail dari satu detail order
    public function show($id)
    {
        $detail = DetailOrder::findOrFail($id);
        return view('detail_order.show', compact('detail'));
    }

    // Menampilkan form edit detail order
    public function edit($id)
    {
        $detail = DetailOrder::findOrFail($id);
        return view('detail_order.edit', compact('detail'));
    }

    // Memproses update detail order
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_order' => 'required|integer',
            'id_produk' => 'required|integer',
            'jumlah_produk' => 'required|integer',
            'harga_produk' => 'required|numeric',
        ]);

        $detail = DetailOrder::findOrFail($id);

        $detail->update([
            'id_order' => $request->input('id_order'),
            'id_produk' => $request->input('id_produk'),
            'jumlah_produk' => $request->input('jumlah_produk'),
            'harga_produk' => $request->input('harga_produk'),
        ]);

        return redirect()->route('detail_order.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $detail = DetailOrder::findOrFail($id);
        return view('detail_order.delete', compact('detail'));
    }

    // Menghapus data detail order
    public function destroy($id)
    {
        $detail = DetailOrder::findOrFail($id);
        $detail->delete();

        return redirect()->route('detail_order.index');
    }
}
