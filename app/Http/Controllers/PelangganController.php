<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index', [
            'pelanggans' => Pelanggan::all()
        ]);
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        try {
            Pelanggan::create([
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'email' => $request->input('email'),
            ]);

            Log::info('Pelanggan telah ditambahkan', $request->all());

            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan pelanggan: ' . $e->getMessage());

            return redirect()->route('pelanggan.index')->with('error', 'Gagal menambahkan pelanggan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            Log::info('Menampilkan data pelanggan ID: ' . $id);

            return view('pelanggan.show', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pelanggan tidak ditemukan saat show. ID: ' . $id);

            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            Log::info('Mengedit data pelanggan ID: ' . $id);

            return view('pelanggan.edit', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pelanggan tidak ditemukan saat edit. ID: ' . $id);

            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        try {
            $pelanggan = Pelanggan::findOrFail($id);

            $pelanggan->update([
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'email' => $request->input('email'),
            ]);

            Log::info('Pelanggan berhasil diperbarui ID: ' . $id, $request->all());

            return redirect()->route('pelanggan.show', $id)->with('success', 'Pelanggan berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            Log::error('Pelanggan tidak ditemukan saat update. ID: ' . $id);

            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui pelanggan ID: ' . $id . ' | Error: ' . $e->getMessage());

            return redirect()->route('pelanggan.index')->with('error', 'Gagal memperbarui pelanggan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);

            Log::info('Menampilkan halaman konfirmasi hapus pelanggan ID: ' . $id);

            return view('pelanggan.delete', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Pelanggan tidak ditemukan saat delete. ID: ' . $id);

            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();

            Log::info('Pelanggan berhasil dihapus ID: ' . $id);

            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            Log::error('Pelanggan tidak ditemukan saat destroy. ID: ' . $id);

            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus pelanggan ID: ' . $id . ' | Error: ' . $e->getMessage());

            return redirect()->route('pelanggan.index')->with('error', 'Gagal menghapus pelanggan: ' . $e->getMessage());
        }
    }
}
