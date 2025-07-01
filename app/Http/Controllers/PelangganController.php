<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Gagal menambahkan pelanggan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.show', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.edit', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
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

            return redirect()->route('pelanggan.show', $id)->with('success', 'Pelanggan berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Gagal memperbarui pelanggan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.delete', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();

            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->route('pelanggan.index')->with('error', 'Gagal menghapus pelanggan: ' . $e->getMessage());
        }
    }
}
