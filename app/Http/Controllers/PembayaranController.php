<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    // Menampilkan daftar semua pembayaran
    public function index()
    {
        return view('pembayaran.index', [
            'pembayarans' => Pembayaran::all()
        ]);
    }

    // Menampilkan form tambah pembayaran
    public function create()
    {
        return view('pembayaran.create');
    }

    // Menyimpan data pembayaran baru
    public function store(Request $request)
    {
        $request->validate([
            'id_order' => 'required|integer',
            'metode_pembayaran' => 'required|string|max:255',
            'tanggal_pembayaran' => 'required|date',
        ]);

        Pembayaran::create([
            'id_order' => $request->input('id_order'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'tanggal_pembayaran' => $request->input('tanggal_pembayaran'),
        ]);

        return redirect()->route('pembayaran.index');
    }

    // Menampilkan detail pembayaran tertentu
    public function show($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.show', compact('pembayaran'));
    }

    // Menampilkan form edit pembayaran
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.edit', compact('pembayaran'));
    }

    // Memproses update data pembayaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_order' => 'required|integer',
            'metode_pembayaran' => 'required|string|max:255',
            'tanggal_pembayaran' => 'required|date',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([
            'id_order' => $request->input('id_order'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'tanggal_pembayaran' => $request->input('tanggal_pembayaran'),
        ]);

        return redirect()->route('pembayaran.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.delete', compact('pembayaran'));
    }

    // Menghapus data pembayaran
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('pembayaran.index');
    }
}
