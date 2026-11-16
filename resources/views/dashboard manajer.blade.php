<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Manajer - Ecopark Curug Tilu</title>
<!-- Memuat Chart.js untuk Grafik Batang Otomatis -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
body { background: #020617; min-height: 100vh; padding: 30px 15px; }
.dashboard { width: 100%; max-width: 1290px; min-height: 100vh; margin: auto; background: #d8f2dc; border-radius: 35px 35px 0 0; overflow: hidden; position: relative; color: #1b3b2b; }
.header { height: 122px; background: #ccebd3; border-bottom: 1px solid #164c30; display: flex; align-items: center; justify-content: space-between; padding: 0 45px; position: relative; z-index: 5; }
.header-left { display: flex; align-items: center; gap: 35px; }
.menu-btn { border: none; background: transparent; cursor: pointer; display: flex; flex-direction: column; gap: 6px; }
.menu-btn span { width: 37px; height: 5px; background: #101010; border-radius: 5px; }
.header-logo { width: 65px; height: 65px; border-radius: 50%; border: 3px solid #174b30; background: white; object-fit: contain; padding: 3px; }
.header h1 { color: #174b30; font-size: 30px; }
.content { padding: 18px 45px 40px; }
.top-info { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; }
.greeting { color: #176238; font-size: 22px; font-weight: bold; }
.date { font-size: 20px; font-weight: bold; display: flex; align-items: center; gap: 15px; }
.summary { background: #194f31; padding: 30px; border-radius: 30px; box-shadow: 0 6px 10px #0002; }
.summary-title { display: inline-block; background: #d9f3df; padding: 10px 18px; border-radius: 25px; font-size: 16px; font-weight: bold; margin-bottom: 20px; }
.summary-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
.summary-card { background: #d8f2dc; border-radius: 18px; min-height: 83px; display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 5px; text-align: center; font-size: 17px; }
.summary-card strong { font-size: 20px; }
.chart-section { margin-top: 50px; }
.section-title { color: #176238; font-size: 20px; font-weight: bold; margin-bottom: 15px; }
.chart-container { background: #194f31; padding: 25px; border-radius: 28px; box-shadow: 0 6px 10px #0002; max-width: 100%; }
.table-section { margin-top: 50px; }
.table-section h2 { color: #176238; font-size: 20px; text-align: center; margin-bottom: 16px; }
.table-container { overflow-x: auto; border-radius: 10px; }
table { width: 100%; border-collapse: collapse; background: white; min-width: 600px; }
th { background: #194f31; color: white; text-align: left; padding: 16px; font-size: 18px; }
td { border: 1px solid #ccd5df; padding: 15px; font-size: 18px; }
th:first-child, td:first-child { text-align: center; width: 14%; }
.sidebar { position: absolute; top: 122px; left: 45px; width: 372px; background: white; border: 3px solid #151515; border-radius: 0 0 28px 28px; box-shadow: 0 15px 25px #0004; z-index: 10; overflow: hidden; transform: translateX(-120%); opacity: 0; visibility: hidden; transition: 0.3s ease; }
.sidebar.active { transform: translateX(0); opacity: 1; visibility: visible; }
.sidebar-brand { display: flex; align-items: center; gap: 15px; padding: 14px 18px; border-bottom: 1px solid #aaa; min-height: 74px; }
.sidebar-brand img { width: 50px; height: 50px; border-radius: 50%; object-fit: contain; border: 1px solid #174b30; padding: 3px; }
.sidebar-brand strong { color: #164c30; font-size: 14px; }
.user-info { padding: 15px 20px; border-bottom: 1px solid #aaa; font-weight: bold; font-size: 15px; }
.menu-heading { padding: 16px 18px 10px; color: #555; font-weight: bold; font-size: 14px; }
.menu-list { padding: 0 9px 15px; }
.menu-list a { text-decoration: none; color: #111; display: flex; align-items: center; gap: 18px; padding: 14px 17px; margin-bottom: 3px; border-radius: 12px; font-size: 16px; transition: 0.2s; }
.menu-list a:hover, .menu-list a.active { background: #4d964e; color: white; }
.menu-icon { width: 20px; text-align: center; font-size: 17px; }
.logout { border-top: 1px solid #aaa; margin: 0 18px; padding: 23px 0; text-align: center; }
.logout a { color: black; font-weight: bold; text-decoration: none; }
</style>
</head>
<body>

<div class="dashboard">
    <header class="header">
        <div class="header-left">
            <button class="menu-btn" id="menuBtn" aria-label="Buka menu">
                <span></span><span></span><span></span>
            </button>
            <img src="{{ asset('images/logo-ecopark.jpeg') }}" class="header-logo" alt="Logo Ecopark">
        </div>
        <h1>Manajer</h1>
    </header>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/logo-ecopark.jpeg') }}" alt="Logo">
            <strong>ECOPARK CURUG TILU</strong>
        </div>
        <div class="user-info">👤 &nbsp; Halo, Manajer</div>
        <div class="menu-heading">MENU UTAMA</div>
        <nav class="menu-list">
            <a href="{{ route('manajer.dashboard') }}" class="active"><span class="menu-icon">⌂</span> Dashboard Utama</a>
            <a href="{{ route('manajer.laporan') }}"><span class="menu-icon">▥</span> Laporan & Statistik</a>
            <a href="{{ route('manajer.keuangan') }}"><span class="menu-icon">💱</span> Keuangan & Transaksi</a>
            <a href="{{ url('/manajer/kelola-tiket') }}"><span class="menu-icon">🎟</span> Manajemen Tiket & Kuota</a>
            <a href="{{ route('manajer.karyawan') }}"><span class="menu-icon">♟</span> Data Karyawan / Petugas</a>
            <a href="{{ route('manajer.pengaturan') }}"><span class="menu-icon">⚙</span> Pengaturan Akun</a>
        </nav>
        <div class="logout">
            <a href="{{ route('logout') }}">→ Keluar / Logout</a>
        </div>
    </aside>

    <main class="content">
        <div class="top-info">
            <div class="greeting">Hallo, Manajer</div>
            <div class="date"><span>🗓️</span> {{ date('d M Y') }}</div>
        </div>

        <section class="summary">
            <div class="summary-title">RINGKASAN HARI INI</div>
            <div class="summary-cards">
                <div class="summary-card">
                    <span>Total Jenis Tiket / Wahana</span>
                    <strong>{{ count($tikets ?? []) }} Item</strong>
                </div>
                <div class="summary-card">
                    <span>Total Kuota Pengunjung</span>
                    <strong>{{ collect($tikets)->sum('quota') }} orang</strong>
                </div>
            </div>
        </section>

        <!-- GRAFIK BATANG DINAMIS (CHART.JS) -->
        <section class="chart-section">
            <h2 class="section-title">GRAFIK TREN KAPASITAS KUOTA WAHANA</h2>
            <div class="chart-container">
                <canvas id="salesChart" height="100"></canvas>
            </div>
        </section>

        <section class="table-section">
            <h2>REKAPITULASI DATA TIKET TERBARU</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Tiket / Wahana</th>
                            <th>Harga (Rp)</th>
                            <th>Kuota Tersedia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tikets ?? [] as $index => $tiket)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tiket->name }}</td>
                            <td>Rp {{ number_format($tiket->price, 0, ',', '.') }}</td>
                            <td>{{ $tiket->quota }} orang</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 20px;">Belum ada data tiket. Silakan tambah melalui menu Manajemen Tiket.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<script>
// Sidebar Toggle Script
const menuBtn = document.getElementById('menuBtn');
const sidebar = document.getElementById('sidebar');

menuBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    sidebar.classList.toggle('active');
});

document.addEventListener('click', function(event) {
    if (!sidebar.contains(event.target) && !menuBtn.contains(event.target)) {
        sidebar.classList.remove('active');
    }
});

// Grafik Batang Dinamis menggunakan Chart.js
const tiketLabels = @json(collect($tikets ?? [])->pluck('name'));
const tiketQuotas = @json(collect($tikets ?? [])->pluck('quota'));

const ctx = document.getElementById('salesChart').getContext('2d');
const salesChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: tiketLabels.length > 0 ? tiketLabels : ['Belum Ada Wahana'],
        datasets: [{
            label: 'Kapasitas Kuota Harian',
            data: tiketQuotas.length > 0 ? tiketQuotas : [0],
            backgroundColor: '#d8f2dc',
            borderColor: '#ffffff',
            borderWidth: 2,
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                labels: { color: '#ffffff', font: { size: 14 } }
            }
        },
        scales: {
            x: {
                ticks: { color: '#ffffff', font: { size: 13 } },
                grid: { display: false }
            },
            y: {
                ticks: { color: '#ffffff', font: { size: 13 } },
                grid: { color: 'rgba(255, 255, 255, 0.1)' }
            }
        }
    }
});
</script>
</body>
</html>
