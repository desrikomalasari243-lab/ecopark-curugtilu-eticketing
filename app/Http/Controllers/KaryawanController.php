<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawanList = session()->get('karyawan_list', [
            ['nama' => 'Asep Saepudin', 'jabatan' => 'Petugas Loket Utama'],
            ['nama' => 'Siti Nurhaliza', 'jabatan' => 'Pengawas Wahana Flying Fox'],
            ['nama' => 'Budi Gunawan', 'jabatan' => 'Petugas Kebersihan & Area Camping'],
        ]);

        return view('karyawan', compact('karyawanList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $karyawanList = session()->get('karyawan_list', [
            ['nama' => 'Asep Saepudin', 'jabatan' => 'Petugas Loket Utama'],
            ['nama' => 'Siti Nurhaliza', 'jabatan' => 'Pengawas Wahana Flying Fox'],
            ['nama' => 'Budi Gunawan', 'jabatan' => 'Petugas Kebersihan & Area Camping'],
        ]);

        array_unshift($karyawanList, [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan
        ]);

        session()->put('karyawan_list', $karyawanList);

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan / petugas berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $karyawanList = session()->get('karyawan_list', []);

        if (isset($karyawanList[$id])) {
            $karyawanList[$id] = [
                'nama' => $request->nama,
                'jabatan' => $request->jabatan
            ];

            session()->put('karyawan_list', $karyawanList);
        }

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan / petugas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $karyawanList = session()->get('karyawan_list', []);

        if (isset($karyawanList[$id])) {
            unset($karyawanList[$id]);
            session()->put('karyawan_list', array_values($karyawanList));
        }

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan / petugas berhasil dihapus!');
    }
}
