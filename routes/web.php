<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;

/*
|--------------------------------------------------------------------------
| 1. HALAMAN LOGIN UTAMA
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('login');
})->name('login');


/*
|--------------------------------------------------------------------------
| 2. PROSES PILIHAN PERAN
|--------------------------------------------------------------------------
*/
Route::post('/login', function (Request $request) {
    $peran = $request->input('peran');

    if (in_array($peran, ['petugas_gate', 'admin', 'manajer'])) {
        $request->session()->put('selected_role', $peran);
        return redirect('/login-petugas');
    }

    $request->session()->put('role', 'wisatawan');
    return redirect('/dashboard-wisatawan');
})->name('login.process');


/*
|--------------------------------------------------------------------------
| 3. LOGIN PENGELOLA
|--------------------------------------------------------------------------
*/
Route::get('/login-petugas', function () {
    return view('login-petugas');
})->name('login.petugas');

Route::post('/login-petugas', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $email = strtolower($request->input('email'));

    if (str_contains($email, 'admin')) {
        $role = 'admin';
    } elseif (str_contains($email, 'manajer')) {
        $role = 'manajer';
    } else {
        $role = 'petugas_gate';
    }

    $request->session()->regenerate();
    $request->session()->put('role', $role);

    if ($role === 'admin') return redirect('/admin-dashboard');
    if ($role === 'manajer') return redirect('/manajer');
    return redirect('/petugas-gate');
})->name('login.petugas.process');


/*
|--------------------------------------------------------------------------
| 4. LOGOUT
|--------------------------------------------------------------------------
*/
Route::match(['get', 'post'], '/logout', function (Request $request) {
    $request->session()->flush();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');


/*
|--------------------------------------------------------------------------
| 5. DASHBOARD WISATAWAN & ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-wisatawan', function () {
    return view('dasboard-wisatawan');
});

Route::get('/admin-dashboard', function () {
    return view('dashboard admin');
})->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| 6. DASHBOARD MANAJER & E-TIKET WISATAWAN
|--------------------------------------------------------------------------
*/
Route::get('/manajer', function () {
    $tikets = Ticket::all();
    return view('dashboard manajer', compact('tikets'));
})->name('manajer.dashboard');

Route::get('/manajer/laporan', function () {
    $tikets = Ticket::all();
    return view('manajer.laporan', compact('tikets'));
})->name('manajer.laporan');

Route::get('/manajer/keuangan', function () {
    $tikets = Ticket::all();
    return view('manajer.keuangan', compact('tikets'));
})->name('manajer.keuangan');

Route::get('/manajer/karyawan', function (Request $request) {
    $karyawanList = $request->session()->get('karyawanList', []);
    return view('karyawan', compact('karyawanList'));
})->name('manajer.karyawan');

Route::get('/manajer/pengaturan', function () {
    return view('manajer.pengaturan');
})->name('manajer.pengaturan');

// Menampilkan E-Tiket berdasarkan data pesanan katalog
Route::get('/etiket', function (Request $request) {
    $ticketCode  = $request->session()->get('last_ticket_code', '#ECT-' . date('Ymd') . '436');
    $ticketDate  = $request->session()->get('last_ticket_date', '14 Nov 2026');
    $ticketItems = $request->session()->get('last_ticket_items', [
        '- Tiket Masuk Ecopark (×2)',
        '- Rainbow Slide (×1)',
        '- Paket Jeep Offroad (×2)'
    ]);

    return view('etiket', compact('ticketCode', 'ticketDate', 'ticketItems'));
})->name('etiket.index');

// Endpoint saat tombol Pesan & Bayar diklik di katalog wisatawan
Route::post('/beli-tiket', function (Request $request) {
    $code  = '#ECT-' . date('Ymd') . rand(100, 999);
    $date  = '14 Nov 2026';

    $items = [];
    $qtyMasuk = intval($request->input('qty_masuk', 0));
    $qtyRainbow = intval($request->input('qty_rainbow', 0));
    $qtyPlayground = intval($request->input('qty_playground', 0));
    $qtyJeep = intval($request->input('qty_jeep', 0));

    if ($qtyMasuk > 0) {
        $items[] = "- Tiket Masuk Ecopark (×{$qtyMasuk})";
    }
    if ($qtyRainbow > 0) {
        $items[] = "- Rainbow Slide (×{$qtyRainbow})";
    }
    if ($qtyPlayground > 0) {
        $items[] = "- Playground Anak (×{$qtyPlayground})";
    }
    if ($qtyJeep > 0) {
        $items[] = "- Paket Jeep Offroad (×{$qtyJeep})";
    }

    if (empty($items)) {
        $items = ['- Tiket Masuk Ecopark (×1)'];
    }

    // Simpan ke Session agar langsung terbaca di halaman /etiket
    $request->session()->put('last_ticket_code', $code);
    $request->session()->put('last_ticket_date', $date);
    $request->session()->put('last_ticket_items', $items);

    return redirect('/etiket');
})->name('beli.tiket');


/*
|--------------------------------------------------------------------------
| 7. PETUGAS GATE & PENGATURANNYA
|--------------------------------------------------------------------------
*/
Route::get('/petugas-gate', function (Request $request) {
    return app(TicketController::class)->scanGate($request);
})->name('petugas.gate');

Route::post('/petugas-gate/cek', [TicketController::class, 'scanGate'])
    ->name('petugas.scan');

Route::get('/petugas-gate/pengaturan', function () {
    return view('manajer.pengaturan');
})->name('petugas.pengaturan');


/*
|--------------------------------------------------------------------------
| 8. DATA KARYAWAN (CRUD)
|--------------------------------------------------------------------------
*/
Route::get('/karyawan', function (Request $request) {
    $karyawanList = $request->session()->get('karyawanList', []);
    return view('karyawan', compact('karyawanList'));
})->name('karyawan.index');

Route::post('/karyawan', function (Request $request) {
    $request->validate(['nama' => 'required', 'jabatan' => 'required']);
    $karyawanList = $request->session()->get('karyawanList', []);
    $karyawanList[] = ['nama' => $request->input('nama'), 'jabatan' => $request->input('jabatan')];
    $request->session()->put('karyawanList', $karyawanList);
    return redirect('/karyawan')->with('success', 'Data karyawan berhasil ditambahkan!');
})->name('karyawan.store');

Route::put('/karyawan/{id}', function (Request $request, $id) {
    $request->validate(['nama' => 'required', 'jabatan' => 'required']);
    $karyawanList = $request->session()->get('karyawanList', []);
    if (isset($karyawanList[$id])) {
        $karyawanList[$id] = ['nama' => $request->input('nama'), 'jabatan' => $request->input('jabatan')];
        $request->session()->put('karyawanList', $karyawanList);
    }
    return redirect('/karyawan')->with('success', 'Data karyawan berhasil diubah!');
})->name('karyawan.update');

Route::delete('/karyawan/{id}', function (Request $request, $id) {
    $karyawanList = $request->session()->get('karyawanList', []);
    if (isset($karyawanList[$id])) {
        unset($karyawanList[$id]);
        $request->session()->put('karyawanList', array_values($karyawanList));
    }
    return redirect('/karyawan')->with('success', 'Data karyawan berhasil dihapus!');
})->name('karyawan.destroy');


/*
|--------------------------------------------------------------------------
| 9. KELOLA TIKET / MANAJEMEN TIKET
|--------------------------------------------------------------------------
*/
Route::get('/manajer/kelola-tiket', function () {
    $tikets = Ticket::all();
    $tiket = null;
    return view('kelola-tiket', compact('tikets', 'tiket'));
});

Route::post('/manajer/kelola-tiket', function (Request $request) {
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

    return redirect('/manajer/kelola-tiket')->with('success', 'Item tiket berhasil ditambahkan!');
});

Route::get('/manajer/kelola-tiket/{id}/edit', function ($id) {
    $tiket = Ticket::findOrFail($id);
    $tikets = Ticket::all();
    return view('kelola-tiket', compact('tiket', 'tikets'));
});

Route::put('/manajer/kelola-tiket/{id}', function (Request $request, $id) {
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

    return redirect('/manajer/kelola-tiket')->with('success', 'Item tiket berhasil diperbarui!');
});

Route::delete('/manajer/kelola-tiket/{id}', function ($id) {
    $tiket = Ticket::findOrFail($id);
    $tiket->delete();

    return redirect('/manajer/kelola-tiket')->with('success', 'Item tiket berhasil dihapus!');
});

Route::get('/tiket', function () {
    $tikets = Ticket::all();
    return view('kelola-tiket', compact('tikets'));
})->name('tiket.index');
