
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard - Ecopark Curug Tilu</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: #020515;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 25px 15px;
    color: white;
}

.dashboard {
    width: 100%;
    max-width: 1195px;
    min-height: 620px;
    background: #194e32;
    border-radius: 32px;
    overflow: hidden;
    position: relative;
}

/* HEADER */
.header {
    height: 98px;
    border-bottom: 2px solid #a5c5aa;
    display: flex;
    align-items: center;
    padding: 0 42px;
    gap: 32px;
}

.menu-btn {
    border: none;
    background: transparent;
    color: white;
    font-size: 35px;
    cursor: pointer;
}

.header-title {
    font-size: 23px;
    line-height: 29px;
    font-weight: bold;
}

.logout {
    margin-left: auto;
    color: white;
    text-decoration: none;
    font-weight: bold;
    font-size: 18px;
    cursor: pointer;
}

/* CONTENT */
.content {
    padding: 42px 48px;
}

.dashboard-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 65px;
}

h2 {
    font-size: 25px;
    margin-bottom: 18px;
}

/* SUMMARY */
.summary {
    display: flex;
    gap: 20px;
}

.summary-card {
    width: 215px;
    min-height: 113px;
    background: #d8f2dc;
    color: black;
    border-radius: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 15px;
    font-weight: bold;
    position: relative;
}

.summary-card strong {
    display: block;
    font-size: 19px;
    margin-bottom: 5px;
}

.summary-card small {
    font-size: 16px;
}

.summary-card:before,
.summary-card:after {
    content: "";
    position: absolute;
    width: 18px;
    height: 27px;
    background: #194e32;
    left: -9px;
    border-radius: 50%;
}

.summary-card:before {
    top: 24px;
}

.summary-card:after {
    top: 57px;
}

/* TRANSAKSI */
.transaction-box {
    background: #d8f2dc;
    color: black;
    border-radius: 14px;
    overflow: hidden;
}

.transaction-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    min-height: 49px;
    align-items: center;
    text-align: center;
    font-weight: bold;
}

.transaction-row div {
    padding: 12px 5px;
}

.transaction-row div:not(:last-child) {
    border-right: 1px dashed #777;
}

.detail-btn {
    border: none;
    background: transparent;
    color: #08733d;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}

/* MANAJEMEN */
.management {
    margin-top: 26px;
}

.management-buttons {
    display: flex;
    flex-direction: column;
    gap: 18px;
    width: 540px;
    max-width: 100%;
}

.management-btn {
    background: #d8f2dc;
    color: black;
    border: none;
    border-radius: 40px;
    padding: 15px 25px;
    min-height: 51px;
    font-size: 17px;
    font-weight: bold;
    cursor: pointer;
    transition: .2s;
}

.management-btn:hover {
    background: #a9dcb1;
    transform: translateX(5px);
}

.management-btn span {
    margin-right: 15px;
}

/* SIDEBAR */
.sidebar {
    position: absolute;
    top: 98px;
    left: -390px;
    width: 345px;
    background: white;
    color: #111;
    z-index: 10;
    border: 2px solid #111;
    border-radius: 0 0 30px 30px;
    transition: left .3s ease;
    overflow: hidden;
    box-shadow: 0 5px 20px #0005;
}

.sidebar.active {
    left: 42px;
}

.logo-area {
    height: 73px;
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 12px 18px;
    border-bottom: 1px solid #bbb;
    font-size: 13px;
    font-weight: bold;
}

.logo-area img {
    width: 45px;
    height: 45px;
    object-fit: contain;
    border-radius: 50%;
}

.admin-info {
    padding: 13px 20px;
    border-bottom: 1px solid #bbb;
    font-weight: bold;
    font-size: 14px;
}

.menu-label {
    padding: 14px 18px 5px;
    font-size: 13px;
    font-weight: bold;
    color: #555;
}

.sidebar-menu {
    padding: 0 9px;
}

.sidebar-menu button {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 12px;
    text-align: left;
    border: none;
    padding: 13px 15px;
    background: white;
    border-radius: 12px;
    cursor: pointer;
    font-size: 14px;
    color: #111;
}

.sidebar-menu button:hover,
.sidebar-menu button.active {
    background: #4c994e;
    color: white;
}

.sidebar-menu img {
    width: 23px;
    height: 23px;
    object-fit: contain;
}

.menu-icon {
    width: 23px;
    text-align: center;
    font-size: 19px;
}

.sidebar-logout {
    margin: 13px 17px 17px;
    padding: 15px;
    border-top: 1px solid #bbb;
    text-align: center;
    font-weight: bold;
    cursor: pointer;
}

/* HALAMAN */
.page-section {
    display: none;
}

.page-section.active {
    display: block;
}

.page-title {
    margin-bottom: 25px;
}

.page-card {
    background: #d8f2dc;
    color: black;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 20px;
}

.page-card input,
.page-card select {
    padding: 11px;
    border: 1px solid #aaa;
    border-radius: 7px;
    margin: 8px 0;
    width: 100%;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    background: #d8f2dc;
    color: black;
    border-radius: 12px;
    overflow: hidden;
}

.data-table th,
.data-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #b6d5bc;
}

.data-table th {
    background: #b8dfbf;
}

.action-btn {
    padding: 8px 13px;
    border: none;
    border-radius: 7px;
    background: #287744;
    color: white;
    cursor: pointer;
}

.action-btn:hover {
    background: #194e32;
}

/* MODAL */
.modal {
    display: none;
    position: fixed;
    inset: 0;
    background: #0009;
    z-index: 50;
    justify-content: center;
    align-items: center;
    padding: 15px;
}

.modal.active {
    display: flex;
}

.modal-content {
    background: white;
    color: black;
    padding: 28px;
    width: 400px;
    max-width: 100%;
    border-radius: 18px;
}

.modal-content h2 {
    margin-bottom: 15px;
}

.close-btn {
    margin-top: 20px;
    padding: 10px 20px;
    background: #194e32;
    color: white;
    border: none;
    border-radius: 7px;
    cursor: pointer;
}

/* RESPONSIVE */
@media(max-width: 850px) {
    body {
        align-items: flex-start;
    }

    .dashboard {
        min-height: 90vh;
    }

    .header {
        padding: 0 20px;
        gap: 18px;
    }

    .header-title {
        font-size: 17px;
    }

    .content {
        padding: 28px 20px;
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .summary {
        flex-wrap: wrap;
    }

    .summary-card {
        flex: 1;
        min-width: 130px;
    }

    .management-buttons {
        width: 100%;
    }

    .sidebar.active {
        left: 10px;
    }

    .sidebar {
        width: min(345px, calc(100% - 20px));
    }

    .data-table {
        font-size: 12px;
    }

    .data-table th,
    .data-table td {
        padding: 9px 5px;
    }
}
</style>
</head>

<body>

<div class="dashboard">

    <!-- HEADER -->
    <header class="header">

        <button class="menu-btn" onclick="toggleSidebar()">☰</button>

        <div class="header-title">
            Admin Dashboard<br>
            Hello Admin Ecopark !
        </div>

        <a class="logout" onclick="logout()">logout</a>

    </header>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

        <div class="logo-area">

            <img src="{{ asset('images/logo-ecopark.jpeg') }}"
                 alt="Logo Ecopark">

            <span>ECOPARK CURUG TILU</span>

        </div>

        <div class="admin-info">
            👤 &nbsp; Halo, Administrator
        </div>

        <div class="menu-label">MENU UTAMA</div>

        <nav class="sidebar-menu">

            <button class="active"
                onclick="showPage('dashboard',this)">
                <span class="menu-icon">⌂</span>
                Dashboard Utama
            </button>

            <button onclick="showPage('laporan',this)">
                <img src="{{ asset('images/logo laporan.png') }}"
                     alt="Laporan">
                Laporan & Statistik
            </button>

            <button onclick="showPage('keuangan',this)">
                <img src="{{ asset('images/logo uang.png') }}"
                     alt="Keuangan">
                Keuangan & Transaksi
            </button>

            <button onclick="showPage('tiket',this)">
                <span class="menu-icon">🎟</span>
                Manajemen Tiket
            </button>

            <button onclick="showPage('pengguna',this)">
                <span class="menu-icon">👤</span>
                Kelola User/Petugas
            </button>

        </nav>

        <div class="sidebar-logout" onclick="logout()">
            ➜ &nbsp; Keluar / Logout
        </div>

    </aside>

    <!-- ISI DASHBOARD -->
    <main class="content">

        <!-- DASHBOARD UTAMA -->
        <section class="page-section active" id="dashboard">

            <div class="dashboard-grid">

                <div>

                    <h2>RINGKASAN HARI INI</h2>

                    <div class="summary">

                        <div class="summary-card">
                            <div>
                                <strong>🎟 Tiket Terjual</strong>
                                <small>142 Tiket</small>
                            </div>
                        </div>

                        <div class="summary-card">
                            <div>
                                <strong>Pemasukan</strong>
                                <small>Rp 4.250.000</small>
                            </div>
                        </div>

                    </div>

                </div>

                <div>

                    <h2>TERAKHIR TRANSAKSI</h2>

                    <div class="transaction-box">

                        <div class="transaction-row">
                            <div>#ECT-001</div>
                            <div>Rp 120.000</div>
                            <div>
                                <button class="detail-btn"
                                    onclick="showDetail('ECT-001','120.000')">
                                    Detail
                                </button>
                            </div>
                        </div>

                        <div class="transaction-row">
                            <div>#ECT-002</div>
                            <div>Rp 25.000</div>
                            <div>
                                <button class="detail-btn"
                                    onclick="showDetail('ECT-002','25.000')">
                                    Detail
                                </button>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="management">

                <h2>MANAJEMEN SISTEM</h2>

                <div class="management-buttons">

                    <button class="management-btn"
                        onclick="showPage('pengguna')">
                        <span>👤</span>
                        Kelola User/Petugas
                    </button>

                    <button class="management-btn"
                        onclick="showPage('tiket')">
                        <span>🎟</span>
                        Kelola Tiket & Wahana
                    </button>

                    <button class="management-btn"
                        onclick="showPage('keuangan')">
                        <span>📊</span>
                        Laporan Transaksi
                    </button>

                </div>

            </div>

        </section>

        <!-- LAPORAN -->
        <section class="page-section" id="laporan">

            <h2 class="page-title">LAPORAN & STATISTIK</h2>

            <div class="page-card">

                <h3>Statistik Penjualan Tiket</h3>

                <p style="margin-top:15px">
                    Total tiket terjual: <b>142 Tiket</b>
                </p>

                <p style="margin-top:10px">
                    Total pemasukan: <b>Rp 4.250.000</b>
                </p>

            </div>

            <button class="action-btn" onclick="window.print()">
                Cetak Laporan
            </button>

        </section>

        <!-- KEUANGAN -->
        <section class="page-section" id="keuangan">

            <h2 class="page-title">KEUANGAN & TRANSAKSI</h2>

            <table class="data-table">

                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>ECT-001</td>
                        <td>Rp 120.000</td>
                        <td>Lunas</td>
                        <td>
                            <button class="action-btn"
                                onclick="showDetail('ECT-001','120.000')">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>ECT-002</td>
                        <td>Rp 25.000</td>
                        <td>Lunas</td>
                        <td>
                            <button class="action-btn"
                                onclick="showDetail('ECT-002','25.000')">
                                Detail
                            </button>
                        </td>
                    </tr>

                </tbody>

            </table>

        </section>

        <!-- MANAJEMEN TIKET -->
        <section class="page-section" id="tiket">

            <h2 class="page-title">MANAJEMEN TIKET & WAHANA</h2>

            <div class="page-card">

                <h3>Tambah Tiket / Wahana</h3>

                <form onsubmit="addTicket(event)">

                    <input id="ticketName"
                        placeholder="Nama tiket atau wahana"
                        required>

                    <input id="ticketPrice"
                        type="number"
                        placeholder="Harga tiket"
                        min="0"
                        required>

                    <button class="action-btn" type="submit">
                        Tambah Data
                    </button>

                </form>

            </div>

            <table class="data-table">

                <thead>
                    <tr>
                        <th>Nama Tiket</th>
                        <th>Harga</th>
                    </tr>
                </thead>

                <tbody id="ticketList">

                    <tr>
                        <td>Tiket Reguler</td>
                        <td>Rp 30.000</td>
                    </tr>

                    <tr>
                        <td>Tiket Terusan</td>
                        <td>Rp 50.000</td>
                    </tr>

                </tbody>

            </table>

        </section>

        <!-- KELOLA PENGGUNA -->
        <section class="page-section" id="pengguna">

            <h2 class="page-title">KELOLA USER / PETUGAS</h2>

            <div class="page-card">

                <h3>Tambah Pengguna</h3>

                <form onsubmit="addUser(event)">

                    <input id="userName"
                        placeholder="Nama pengguna"
                        required>

                    <input id="userEmail"
                        type="email"
                        placeholder="Email pengguna"
                        required>

                    <select id="userRole">
                        <option>Admin</option>
                        <option>Petugas Gate</option>
                        <option>Manajer</option>
                    </select>

                    <button class="action-btn" type="submit">
                        Tambah Pengguna
                    </button>

                </form>

            </div>

            <table class="data-table">

                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Peran</th>
                    </tr>
                </thead>

                <tbody id="userList">

                    <tr>
                        <td>Administrator</td>
                        <td>admin@ecopark.com</td>
                        <td>Admin</td>
                    </tr>

                </tbody>

            </table>

        </section>

    </main>

</div>

<!-- MODAL DETAIL TRANSAKSI -->
<div class="modal" id="detailModal">

    <div class="modal-content">

        <h2>Detail Transaksi</h2>

        <p id="detailId"></p>

        <p id="detailAmount" style="margin-top:12px"></p>

        <p style="margin-top:12px">
            Status: <b>Lunas</b>
        </p>

        <button class="close-btn" onclick="closeModal()">
            Tutup
        </button>

    </div>

</div>

<script>

// SIDEBAR
function toggleSidebar() {
    document.getElementById('sidebar')
        .classList.toggle('active');
}

// PINDAH HALAMAN
function showPage(page, button) {

    document.querySelectorAll('.page-section')
        .forEach(section => {
            section.classList.remove('active');
        });

    document.getElementById(page)
        .classList.add('active');

    document.querySelectorAll('.sidebar-menu button')
        .forEach(btn => {
            btn.classList.remove('active');
        });

    if (button) {
        button.classList.add('active');
    } else {
        document.querySelectorAll('.sidebar-menu button')
            .forEach(btn => {
                if (btn.getAttribute('onclick') &&
                    btn.getAttribute('onclick').includes("'" + page + "'")) {
                    btn.classList.add('active');
                }
            });
    }

    document.getElementById('sidebar')
        .classList.remove('active');

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// DETAIL TRANSAKSI
function showDetail(id, amount) {

    document.getElementById('detailId').innerText =
        'ID Transaksi: #' + id;

    document.getElementById('detailAmount').innerText =
        'Total Pembayaran: Rp ' + amount;

    document.getElementById('detailModal')
        .classList.add('active');
}

function closeModal() {
    document.getElementById('detailModal')
        .classList.remove('active');
}

// TAMBAH TIKET SEMENTARA
function addTicket(event) {

    event.preventDefault();

    const name = document.getElementById('ticketName').value;
    const price = Number(document.getElementById('ticketPrice').value);

    const row = document.createElement('tr');

    const nameCell = document.createElement('td');
    nameCell.textContent = name;

    const priceCell = document.createElement('td');
    priceCell.textContent =
        'Rp ' + price.toLocaleString('id-ID');

    row.append(nameCell, priceCell);

    document.getElementById('ticketList')
        .appendChild(row);

    event.target.reset();

    alert('Data tiket berhasil ditambahkan pada tampilan!');
}

// TAMBAH USER SEMENTARA
function addUser(event) {

    event.preventDefault();

    const name = document.getElementById('userName').value;
    const email = document.getElementById('userEmail').value;
    const role = document.getElementById('userRole').value;

    const row = document.createElement('tr');

    [name, email, role].forEach(value => {

        const cell = document.createElement('td');

        cell.textContent = value;

        row.appendChild(cell);

    });

    document.getElementById('userList')
        .appendChild(row);

    event.target.reset();

    alert('Pengguna berhasil ditambahkan pada tampilan!');
}

// LOGOUT
function logout() {

    if (confirm('Apakah kamu yakin ingin keluar?')) {
        window.location.href = '/logout';
    }

}

// TUTUP MODAL KETIKA KLIK DI LUAR
document.getElementById('detailModal')
    .addEventListener('click', function(event) {

        if (event.target === this) {
            closeModal();
        }

    });

</script>

</body>
</html>
