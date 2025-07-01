<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

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

        try {
            Produk::create($validated);

            Log::info('Produk berhasil ditambahkan', $validated);

            return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan produk: ' . $e->getMessage());

            return redirect()->route('produk.index')->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $produk = Produk::findOrFail($id);

            Log::info('Menampilkan produk ID: ' . $id);

            return view('produk.show', compact('produk'));
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat show. ID: ' . $id);

            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $produk = Produk::findOrFail($id);

            Log::info('Mengedit produk ID: ' . $id);

            return view('produk.edit', compact('produk'));
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat edit. ID: ' . $id);

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

            Log::info('Produk berhasil diperbarui ID: ' . $id, $validated);

            return redirect()->route('produk.show', $id)->with('success', 'Produk berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat update. ID: ' . $id);

            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui produk ID: ' . $id . ' | Error: ' . $e->getMessage());

            return redirect()->route('produk.index')->with('error', 'Gagal memperbarui produk: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $produk = Produk::findOrFail($id);

            Log::info('Menampilkan konfirmasi hapus produk ID: ' . $id);

            return view('produk.delete', compact('produk'));
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat delete. ID: ' . $id);

            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            $produk->delete();

            Log::info('Produk berhasil dihapus ID: ' . $id);

            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            Log::error('Produk tidak ditemukan saat destroy. ID: ' . $id);

            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus produk ID: ' . $id . ' | Error: ' . $e->getMessage());

            return redirect()->route('produk.index')->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }
}
