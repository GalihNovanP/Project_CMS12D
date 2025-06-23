<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk.index', [
            'produks' => Produk::all()
        ]);
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Produk::create($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            return view('produk.show', compact('produk'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            return view('produk.edit', compact('produk'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        try {
            $produk = Produk::findOrFail($id);
            $produk->update($validated);
            return redirect()->route('produk.show', $id)->with('success', 'Produk berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            return view('produk.delete', compact('produk'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            $produk->delete();
            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }
    }
}
