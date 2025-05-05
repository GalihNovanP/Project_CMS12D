<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

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

        Karyawan::create($request->only('nama_karyawan', 'jabatan_karyawan'));

        return redirect()->route('karyawan.index');
    }

    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|string',
            'jabatan_karyawan' => 'required|string',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->only('nama_karyawan', 'jabatan_karyawan'));

        return redirect()->route('karyawan.show', $id);
    }

    public function delete($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.delete', compact('karyawan'));
    }

    public function destroy($id)
    {
        Karyawan::destroy($id);
        return redirect()->route('karyawan.index');
    }
}
