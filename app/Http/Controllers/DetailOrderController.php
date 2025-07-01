<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class DetailOrderController extends Controller
{
    public function index()
    {
        return view('detail_order.index', [
            'details' => DetailOrder::all()
        ]);
    }

    public function create()
    {
        return view('detail_order.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_order' => 'required|integer',
            'id_produk' => 'required|integer',
            'jumlah_produk' => 'required|integer',
            'harga_produk' => 'required|numeric',
        ]);

        try {
            DetailOrder::create([
                'id_order' => $request->input('id_order'),
                'id_produk' => $request->input('id_produk'),
                'jumlah_produk' => $request->input('jumlah_produk'),
                'harga_produk' => $request->input('harga_produk'),
            ]);

            Log::info('Detail order berhasil ditambahkan', $request->only('id_order', 'id_produk', 'jumlah_produk', 'harga_produk'));

            return redirect()->route('detail_order.index')->with('success', 'Detail order berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan detail order: ' . $e->getMessage());

            return redirect()->route('detail_order.index')->with('error', 'Gagal menambahkan detail order: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $detail = DetailOrder::findOrFail($id);

            Log::info('Menampilkan detail order ID: ' . $id);

            return view('detail_order.show', compact('detail'));
        } catch (ModelNotFoundException $e) {
            Log::error('Detail order tidak ditemukan saat show. ID: ' . $id);

            return redirect()->route('detail_order.index')->with('error', 'Detail order tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $detail = DetailOrder::findOrFail($id);

            Log::info('Mengedit detail order ID: ' . $id);

            return view('detail_order.edit', compact('detail'));
        } catch (ModelNotFoundException $e) {
            Log::error('Detail order tidak ditemukan saat edit. ID: ' . $id);

            return redirect()->route('detail_order.index')->with('error', 'Detail order tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_order' => 'required|integer',
            'id_produk' => 'required|integer',
            'jumlah_produk' => 'required|integer',
            'harga_produk' => 'required|numeric',
        ]);

        try {
            $detail = DetailOrder::findOrFail($id);

            $detail->update([
                'id_order' => $request->input('id_order'),
                'id_produk' => $request->input('id_produk'),
                'jumlah_produk' => $request->input('jumlah_produk'),
                'harga_produk' => $request->input('harga_produk'),
            ]);

            Log::info('Detail order berhasil diperbarui ID: ' . $id, $request->only('id_order', 'id_produk', 'jumlah_produk', 'harga_produk'));

            return redirect()->route('detail_order.show', $id)->with('success', 'Detail order berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            Log::error('Detail order tidak ditemukan saat update. ID: ' . $id);

            return redirect()->route('detail_order.index')->with('error', 'Detail order tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui detail order ID: ' . $id . ' | Error: ' . $e->getMessage());

            return redirect()->route('detail_order.index')->with('error', 'Gagal memperbarui detail order: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $detail = DetailOrder::findOrFail($id);

            Log::info('Menampilkan halaman konfirmasi hapus detail order ID: ' . $id);

            return view('detail_order.delete', compact('detail'));
        } catch (ModelNotFoundException $e) {
            Log::error('Detail order tidak ditemukan saat delete. ID: ' . $id);

            return redirect()->route('detail_order.index')->with('error', 'Detail order tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $detail = DetailOrder::findOrFail($id);
            $detail->delete();

            Log::info('Detail order berhasil dihapus ID: ' . $id);

            return redirect()->route('detail_order.index')->with('success', 'Detail order berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            Log::error('Detail order tidak ditemukan saat destroy. ID: ' . $id);

            return redirect()->route('detail_order.index')->with('error', 'Detail order tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus detail order ID: ' . $id . ' | Error: ' . $e->getMessage());

            return redirect()->route('detail_order.index')->with('error', 'Gagal menghapus detail order: ' . $e->getMessage());
        }
    }
}
