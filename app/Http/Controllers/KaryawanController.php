<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

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

            Log::info('Karyawan berhasil ditambahkan', $request->only('nama_karyawan', 'jabatan_karyawan'));

            return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan karyawan: ' . $e->getMessage());

            return redirect()->route('karyawan.index')->with('error', 'Gagal menambahkan karyawan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);

            Log::info('Menampilkan data karyawan ID: ' . $id);

            return view('karyawan.show', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Karyawan tidak ditemukan saat show. ID: ' . $id);

            return redirect()->route('karyawan.index')->with('error', 'Karyawan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);

            Log::info('Mengedit data karyawan ID: ' . $id);

            return view('karyawan.edit', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Karyawan tidak ditemukan saat edit. ID: ' . $id);

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

            Log::info('Karyawan berhasil diperbarui ID: ' . $id, $request->only('nama_karyawan', 'jabatan_karyawan'));

            return redirect()->route('karyawan.show', $id)->with('success', 'Karyawan berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            Log::error('Karyawan tidak ditemukan saat update. ID: ' . $id);

            return redirect()->route('karyawan.index')->with('error', 'Karyawan tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui karyawan ID: ' . $id . ' | Error: ' . $e->getMessage());

            return redirect()->route('karyawan.index')->with('error', 'Gagal memperbarui karyawan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);

            Log::info('Menampilkan konfirmasi hapus karyawan ID: ' . $id);

            return view('karyawan.delete', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            Log::error('Karyawan tidak ditemukan saat delete. ID: ' . $id);

            return redirect()->route('karyawan.index')->with('error', 'Karyawan tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            $karyawan->delete();

            Log::info('Karyawan berhasil dihapus ID: ' . $id);

            return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            Log::error('Karyawan tidak ditemukan saat destroy. ID: ' . $id);

            return redirect()->route('karyawan.index')->with('error', 'Karyawan tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus karyawan ID: ' . $id . ' | Error: ' . $e->getMessage());

            return redirect()->route('karyawan.index')->with('error', 'Gagal menghapus karyawan: ' . $e->getMessage());
        }
    }
}
