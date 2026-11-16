<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    // Menampilkan halaman kelola tiket admin beserta data (Read)
    public function index(Request $request)
    {
        if (!$request->session()->has('role') || $request->session()->get('role') !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak! Silakan login sebagai Admin terlebih dahulu.');
        }

        $tikets = Ticket::orderBy('created_at', 'desc')->get();
        return view('kelola-tiket', compact('tikets'));
    }

    // Input & Data Validation (Create)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kuota' => 'required|integer',
        ]);

        Ticket::create([
            'ticket_code' => 'TCK-' . strtoupper(Str::random(6)),
            'name' => $request->input('nama'),
            'price' => $request->input('harga'),
            'quota' => $request->input('kuota'),
        ]);

        return redirect('/kelola-tiket')->with('success', 'Tiket dan kuota berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $tiket = Ticket::findOrFail($id);
        $tikets = Ticket::orderBy('created_at', 'desc')->get();
        return view('kelola-tiket', compact('tiket', 'tikets'));
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kuota' => 'required|integer',
        ]);

        $ticket = Ticket::findOrFail($id);

        $ticket->update([
            'name' => $request->input('nama'),
            'price' => $request->input('harga'),
            'quota' => $request->input('kuota'),
        ]);

        return redirect('/kelola-tiket')->with('success', 'Tiket dan kuota berhasil diperbarui!');
    }

    // Hapus Data (Delete)
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect('/kelola-tiket')->with('success', 'Tiket berhasil dihapus!');
    }

    // DASHBOARD MANAJER: Mengamankan akses khusus Manajer / Admin
    public function dashboardManajer(Request $request)
    {
        if (!$request->session()->has('role') || !in_array($request->session()->get('role'), ['manajer', 'admin'])) {
            return redirect('/')->with('error', 'Akses ditolak! Silakan login sebagai Manajer.');
        }

        $tikets = Ticket::orderBy('created_at', 'desc')->get();

        $totalPengunjung = $tikets->sum('quota');
        $totalPendapatan = $tikets->sum(function($item) {
            return $item->price * $item->quota;
        });

        return view('dashboard manajer', compact('tikets', 'totalPengunjung', 'totalPendapatan'));
    }

    // SCAN GATE PETUGAS: Mengamankan akses khusus Petugas Gate
    public function scanGate(Request $request)
    {
        if (!$request->session()->has('role') || !in_array($request->session()->get('role'), ['petugas_gate', 'admin'])) {
            return redirect('/')->with('error', 'Akses ditolak! Silakan login sebagai Petugas Gate.');
        }

        $kode = $request->input('kode_tiket');
        $ticket = null;

        if ($kode) {
            $ticket = Ticket::where('ticket_code', 'LIKE', "%$kode%")->first();
        }

        return view('petugas gate', compact('ticket'));
    }
}
