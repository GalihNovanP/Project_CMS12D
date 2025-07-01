<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

            return redirect()->route('detail_order.index')->with('success', 'Detail order berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('detail_order.index')->with('error', 'Gagal menambahkan detail order: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $detail = DetailOrder::findOrFail($id);
            return view('detail_order.show', compact('detail'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('detail_order.index')->with('error', 'Detail order tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $detail = DetailOrder::findOrFail($id);
            return view('detail_order.edit', compact('detail'));
        } catch (ModelNotFoundException $e) {
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

            return redirect()->route('detail_order.show', $id)->with('success', 'Detail order berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('detail_order.index')->with('error', 'Detail order tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->route('detail_order.index')->with('error', 'Gagal memperbarui detail order: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $detail = DetailOrder::findOrFail($id);
            return view('detail_order.delete', compact('detail'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('detail_order.index')->with('error', 'Detail order tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $detail = DetailOrder::findOrFail($id);
            $detail->delete();

            return redirect()->route('detail_order.index')->with('success', 'Detail order berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('detail_order.index')->with('error', 'Detail order tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->route('detail_order.index')->with('error', 'Gagal menghapus detail order: ' . $e->getMessage());
        }
    }
}
