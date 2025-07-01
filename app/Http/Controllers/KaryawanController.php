<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.index', [
            'karyawans' => Karyawan::all()
        ]);
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string',
            'jabatan_karyawan' => 'required|string',
        ]);

        try {
            Karyawan::create($request->only('nama_karyawan', 'jabatan_karyawan'));
            return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')->with('error', 'Gagal menambahkan karyawan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            return view('karyawan.show', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('karyawan.index')->with('error', 'Karyawan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            return view('karyawan.edit', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('karyawan.index')->with('error', 'Karyawan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|string',
            'jabatan_karyawan' => 'required|string',
        ]);

        try {
            $karyawan = Karyawan::findOrFail($id);
            $karyawan->update($request->only('nama_karyawan', 'jabatan_karyawan'));
            return redirect()->route('karyawan.show', $id)->with('success', 'Karyawan berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('karyawan.index')->with('error', 'Karyawan tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')->with('error', 'Gagal memperbarui karyawan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            return view('karyawan.delete', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('karyawan.index')->with('error', 'Karyawan tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            $karyawan->delete();
            return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('karyawan.index')->with('error', 'Karyawan tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')->with('error', 'Gagal menghapus karyawan: ' . $e->getMessage());
        }
    }
}
