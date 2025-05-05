<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Menampilkan daftar semua order
    public function index()
    {
        return view('order.index', [
            'orders' => Order::all()
        ]);
    }

    // Menampilkan form tambah order
    public function create()
    {
        return view('order.create');
    }

    // Menyimpan data order baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_order' => 'required|date',
            'jumlah_order' => 'required|integer',
        ]);

        Order::create([
            'tanggal_order' => $request->input('tanggal_order'),
            'jumlah_order' => $request->input('jumlah_order'),
        ]);

        return redirect()->route('order.index');
    }

    // Menampilkan detail order
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));
    }

    // Menampilkan form edit order
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('order.edit', compact('order'));
    }

    // Memproses update data order
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_order' => 'required|date',
            'jumlah_order' => 'required|integer',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'tanggal_order' => $request->input('tanggal_order'),
            'jumlah_order' => $request->input('jumlah_order'),
        ]);

        return redirect()->route('order.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $order = Order::findOrFail($id);
        return view('order.delete', compact('order'));
    }

    // Menghapus data order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index');
    }
}
