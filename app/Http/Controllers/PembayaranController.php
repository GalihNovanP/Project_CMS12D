<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('pembayaran.index', [
            'pembayarans' => Pembayaran::all()
        ]);
    }

    public function create()
    {
        return view('pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_order' => 'required|integer',
            'metode_pembayaran' => 'required|string|max:255',
            'tanggal_pembayaran' => 'required|date',
        ]);

        try {
            Pembayaran::create([
                'id_order' => $request->input('id_order'),
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'tanggal_pembayaran' => $request->input('tanggal_pembayaran'),
            ]);

            Log::info('Pembayaran berhasil ditambahkan', $request->only('id_order', 'metode_pembayaran', 'tanggal_pembayaran'));

            return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan pembayaran: ' . $e->getMessage());

            return redirect()->route('pembayaran.index')->with('error', 'Gagal menambahkan pembayaran: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $pembayaran = Pembayaran::findOrFail($id);

            Log::info('Menampilkan data pembayaran ID: ' . $id);

            return view('pembayaran.show', compact('pembayaran'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pembayaran tidak ditemukan saat show. ID: ' . $id);

            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $pembayaran = Pembayaran::findOrFail($id);

            Log::info('Mengedit data pembayaran ID: ' . $id);

            return view('pembayaran.edit', compact('pembayaran'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pembayaran tidak ditemukan saat edit. ID: ' . $id);

            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_order' => 'required|integer',
            'metode_pembayaran' => 'required|string|max:255',
            'tanggal_pembayaran' => 'required|date',
        ]);

        try {
            $pembayaran = Pembayaran::findOrFail($id);
            $pembayaran->update([
                'id_order' => $request->input('id_order'),
                'metode_pembayaran' => $request->input('metode_pembayaran'),
                'tanggal_pembayaran' => $request->input('tanggal_pembayaran'),
            ]);

            Log::info('Pembayaran berhasil diperbarui ID: ' . $id, $request->only('id_order', 'metode_pembayaran', 'tanggal_pembayaran'));

            return redirect()->route('pembayaran.show', $id)->with('success', 'Pembayaran berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            Log::error('Pembayaran tidak ditemukan saat update. ID: ' . $id);

            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui pembayaran ID: ' . $id . ' | Error: ' . $e->getMessage());

            return redirect()->route('pembayaran.index')->with('error', 'Gagal memperbarui pembayaran: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $pembayaran = Pembayaran::findOrFail($id);

            Log::info('Menampilkan konfirmasi hapus pembayaran ID: ' . $id);

            return view('pembayaran.delete', compact('pembayaran'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pembayaran tidak ditemukan saat delete. ID: ' . $id);

            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $pembayaran = Pembayaran::findOrFail($id);
            $pembayaran->delete();

            Log::info('Pembayaran berhasil dihapus ID: ' . $id);

            return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            Log::error('Pembayaran tidak ditemukan saat destroy. ID: ' . $id);

            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus pembayaran ID: ' . $id . ' | Error: ' . $e->getMessage());

            return redirect()->route('pembayaran.index')->with('error', 'Gagal menghapus pembayaran: ' . $e->getMessage());
        }
    }
}
