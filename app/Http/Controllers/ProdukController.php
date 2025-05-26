<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    // Menampilkan daftar semua produk
    public function index()
    {
        return view('produk.index', [
            'produks' => Produk::all()
        ]);
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('produk.create');
    }

    // Menyimpan data produk baru
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        // Simpan data ke database
        Produk::create($validated);

        // Redirect ke daftar produk dengan pesan sukses (opsional)
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan detail produk
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // Memproses update data produk
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($validated);

        return redirect()->route('produk.show', $id)->with('success', 'Produk berhasil diperbarui.');
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.delete', compact('produk'));
    }

    // Menghapus data produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
