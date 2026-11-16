<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        // Paksa set session manajer supaya sistem maca yen manajer nuju aktif
        $request->session()->put('role', 'manajer');

        $tikets = Ticket::all();
        $tiket = null;
        return view('kelola-tiket', compact('tikets', 'tiket'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'quota' => 'required|integer',
        ]);

        Ticket::create([
            'name'  => $request->input('name'),
            'price' => $request->input('price'),
            'quota' => $request->input('quota'),
        ]);

        return redirect('/manajer/kelola-tiket')->with('success', 'Item tiket dan kuota berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $tiket = Ticket::findOrFail($id);
        $tikets = Ticket::all();
        return view('kelola-tiket', compact('tiket', 'tikets'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'quota' => 'required|integer',
        ]);

        $tiket = Ticket::findOrFail($id);
        $tiket->update([
            'name'  => $request->input('name'),
            'price' => $request->input('price'),
            'quota' => $request->input('quota'),
        ]);

        return redirect('/manajer/kelola-tiket')->with('success', 'Item tiket dan kuota berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tiket = Ticket::findOrFail($id);
        $tiket->delete();

        return redirect('/manajer/kelola-tiket')->with('success', 'Item tiket dan kuota berhasil dihapus!');
    }

    public function scanGate(Request $request)
    {
        $hasil = null;
        $kode = $request->input('kode');

        if ($kode) {
            // Pengecekan kode tiket sederhana untuk simulasi petugas gate
            if (str_contains(strtoupper($kode), 'CT')) {
                $hasil = [
                    'status' => 'valid',
                    'tamu'   => 'Rina Anggraini',
                    'item'   => 'Wahana Rainbow Slide (2 orang)',
                    'kode'   => $kode
                ];
            } else {
                $hasil = [
                    'status' => 'invalid',
                    'pesan'  => 'Kode tiket tidak terdaftar atau salah!',
                    'kode'   => $kode
                ];
            }
        }

        return view('petugas gate', compact('hasil'));
    }
}
