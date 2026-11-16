<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ecopark Curug Tilu - Petugas Gate</title>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}
body{
    background:#020617;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding: 0;
}
@media (min-width: 768px) {
    body { padding: 24px; }
}
.story{
    width:100%;
    min-height:100vh;
    background:#195a32;
    position:relative;
    overflow-x:hidden;
    padding-bottom: 30px;
}
@media (min-width: 768px) {
    .story{
        width:100%;
        max-width:900px;
        min-height:auto;
        height:auto;
        border-radius:24px;
        box-shadow:0 25px 50px -12px rgba(0, 0, 0, 0.7);
        padding-bottom: 40px;
    }
}
.header{
    position: relative;
    top: 0;
    left: 0;
    right: 0;
    height: 60px;
    padding: 0 20px;
    display:flex;
    align-items:center;
    gap:15px;
    background: rgba(0, 0, 0, 0.15);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}
@media (min-width: 768px) {
    .header { padding: 0 32px; height: 75px; gap: 20px; }
}
.hamburger{
    width:32px;
    cursor:pointer;
    z-index:30;
    flex-shrink: 0;
}
.hamburger span{
    display:block;
    width:28px;
    height:3px;
    background:#fff;
    margin:5px 0;
    border-radius:5px;
}
.mode{
    width:220px;
    height:34px;
    border:1px solid #d5e2d9;
    border-radius:8px;
    display:flex;
    align-items:center;
    color:#fff;
    background: rgba(255, 255, 255, 0.05);
}
@media (min-width: 768px) {
    .mode { width: 260px; height: 38px; }
}
.mode strong{
    font-size:12px;
    padding-left:10px;
}
@media (min-width: 768px) {
    .mode strong { font-size: 13px; }
}
.mode select{
    margin-left:auto;
    margin-right:8px;
    width:125px;
    height:26px;
    background:transparent;
    border:1px solid #c7d8cd;
    border-radius:4px;
    color:#fff;
    font-size:10px;
    text-align:center;
    outline:none;
}
@media (min-width: 768px) {
    .mode select { width: 145px; height: 28px; font-size: 11px; }
}
.mode select option{ color:#222; }
.sidebar{
    position:absolute;
    top: 65px;
    left: 20px;
    width:230px;
    background:#fff;
    border:2px solid #111;
    border-radius:16px;
    overflow:hidden;
    z-index:40;
    box-shadow:0 10px 25px rgba(0,0,0,.4);
}
@media (min-width: 768px) {
    .sidebar { top: 75px; left: 32px; width: 260px; }
}
.sidebar.hide{ display:none; }
.sidebar-header{
    height:55px;
    display:flex;
    align-items:center;
    gap:10px;
    padding:8px 14px;
    border-bottom:1px solid #aaa;
}
.sidebar-header img { width:36px; height:36px; object-fit: contain; }
.brand{ color:#164329; font-size:10px; font-weight:bold; line-height: 1.3; }
.user{
    display:flex;
    align-items:center;
    gap:8px;
    padding:10px 14px;
    color:#333;
    font-size:10px;
    border-bottom: 1px solid #eee;
    font-weight: bold;
}
.user-icon{
    width:22px;
    height:22px;
    border:1px solid #777;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:10px;
}
.menu-title{ padding:8px 14px 4px; color:#555; font-size:8px; font-weight: bold; }
.menu{ list-style:none; padding:0 8px 8px; }
.menu li{ margin:2px 0; }
.menu a{
    height:34px;
    display:flex;
    align-items:center;
    gap:10px;
    padding:0 10px;
    color:#222;
    text-decoration:none;
    font-size:10px;
    border-radius:8px;
    font-weight: 500;
}
.menu a:hover{ background:#e9f2ea; }
.menu a.active{ background:#4d9747; color:#fff; }
.menu-icon{ width:16px; text-align:center; font-size:12px; }
.logout{ border-top:1px solid #aaa; padding:10px 14px; }
.logout a{
    text-decoration:none;
    color:#222;
    font-size:10px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: bold;
}
.content{
    position: relative;
    width: 100%;
    padding: 24px 20px;
    color:#fff;
    z-index:10;
}
@media (min-width: 768px) {
    .content {
        padding: 32px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        align-items: start;
    }
}
.title{
    text-align:center;
    font-size:18px;
    font-weight:bold;
    margin-bottom:20px;
    grid-column: 1 / -1;
}
.left-panel { display: flex; flex-direction: column; align-items: center; }
@media (min-width: 768px) {
    .left-panel { border-right: 1px dashed rgba(255, 255, 255, 0.3); padding-right: 20px; }
}
.right-panel { display: flex; flex-direction: column; align-items: center; }
@media (min-width: 768px) {
    .right-panel { align-items: flex-start; }
}
.scanner{
    width:190px;
    height:170px;
    margin:0 auto 20px;
    border:4px solid #c8d9ce;
    border-radius:24px;
    position:relative;
    display:flex;
    justify-content:center;
    align-items:center;
    background: rgba(0, 0, 0, 0.1);
}
@media (min-width: 768px) {
    .scanner { width: 220px; height: 190px; }
}
.scanner-area{ width:120px; height:120px; position:relative; }
.corner{ position:absolute; width:24px; height:24px; border-color:#fff; border-style:solid; }
.tl{top:0;left:0;border-width:3px 0 0 3px;}
.tr{top:0;right:0;border-width:3px 3px 0 0;}
.bl{bottom:0;left:0;border-width:0 0 3px 3px;}
.br{bottom:0;right:0;border-width:0 3px 3px 0;}
.camera{
    position:absolute;
    width:50px;
    height:36px;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    border:3px solid #fff;
    border-radius:8px;
}
.camera:before{
    content:"";
    position:absolute;
    width:14px;
    height:14px;
    border:3px solid #fff;
    border-radius:50%;
    left:14px;
    top:6px;
}
.camera:after{
    content:"";
    position:absolute;
    width:12px;
    height:5px;
    background:#fff;
    border-radius:3px;
    left:8px;
    top:-8px;
}
.scan-text{
    position:absolute;
    bottom:-26px;
    width:100%;
    text-align:center;
    font-size:9px;
    font-weight: bold;
}
.manual{ margin-top:25px; width: 100%; max-width: 300px; }
.manual-title{ font-size:10px; margin-bottom:6px; font-weight: bold; }
.input-row{ display:flex; gap:8px; }
.input-code{
    width:100%;
    height:38px;
    background:transparent;
    border:1px solid #c8d9ce;
    border-radius:8px;
    color:#fff;
    padding:0 12px;
    font-size:13px;
    outline:none;
}
.input-code::placeholder{ color:rgba(255,255,255,0.7); }
.check{
    width:95px;
    flex-shrink:0;
    background:transparent;
    border:1px solid #c8d9ce;
    border-radius:8px;
    color:#fff;
    font-size:10px;
    font-weight:bold;
    cursor:pointer;
    transition: background 0.2s;
}
.result-title{ font-size:11px; font-weight:bold; margin-bottom:8px; }
.ticket{
    width: 100%;
    max-width: 350px;
    height: 105px;
    background:#fff;
    border:3px solid #e6ece8;
    border-radius:8px;
    position:relative;
    overflow:hidden;
    color:#222;
    padding:10px 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
.ticket-content{ position:relative; z-index:3; width:70%; }
.valid{
    display:inline-block;
    background:#70d04e;
    color:#fff;
    font-size:8px;
    font-weight:bold;
    padding:4px 12px;
    border-radius:4px;
    margin-bottom:6px;
}
.invalid{ background:#e11d48 !important; }
.ticket p{ font-size:9px; margin:4px 0; font-weight: 500; }
.ticket-shape{
    position:absolute;
    top:2px;
    right:-5px;
    width:75px;
    height:70px;
    background:#70d04e;
    clip-path:polygon(20% 0, 100% 0, 100% 100%, 0 100%, 0 20%);
    transform:rotate(-10deg);
    display:flex;
    justify-content:center;
    align-items:center;
}
.ticket-shape span{
    font-size:12px;
    font-weight:bold;
    transform:rotate(10deg);
    color: #fff;
}
.scan-again{
    width:100%;
    max-width: 350px;
    height:36px;
    margin-top:12px;
    background:transparent;
    border:1px solid #fff;
    border-radius:8px;
    color:#fff;
    font-size:11px;
    font-weight:bold;
    cursor:pointer;
    transition: background 0.2s;
}
.check:hover, .scan-again:hover{ background:#fff; color:#195a32; }
</style>
</head>

<body>

<div class="story">
    <!-- HEADER -->
    <div class="header">
        <div class="hamburger" onclick="toggleSidebar()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="mode">
            <strong>MODE:</strong>
            <select>
                <option>Wahana Rainbow Slide</option>
                <option>Gate Masuk</option>
                <option>Kolam Renang</option>
            </select>
        </div>
    </div>

    <!-- SIDEBAR (BERSIH & AMAN SESUAI HAK AKSES PETUGAS GATE) -->
    <div class="sidebar hide" id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/logo-ecopark.jpeg') }}" alt="Logo Ecopark Curug Tilu">
            <div class="brand">ECOPARK CURUG TILU</div>
        </div>
        <div class="user">
            <div class="user-icon">♙</div>
            <span>Halo, Petugas Gate</span>
        </div>
        <div class="menu-title">MENU UTAMA</div>
        <ul class="menu">
            <li>
                <a href="{{ route('petugas.gate') }}" class="active">
                    <span class="menu-icon">⌂</span> Dashboard Utama
                </a>
            </li>
        </ul>
        <div class="logout">
            <a href="{{ route('login') }}">⇥ Keluar / Logout</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <h1 class="title">CAMERA SCANNER PETUGAS GATE</h1>

        <!-- PANEL KIRI -->
        <div class="left-panel">
            <div class="scanner">
                <div class="scanner-area">
                    <div class="corner tl"></div>
                    <div class="corner tr"></div>
                    <div class="corner bl"></div>
                    <div class="corner br"></div>
                    <div class="camera"></div>
                </div>
                <div class="scan-text">Arahkan kamera ke QR Code</div>
            </div>

            <!-- FORM CEK KODE MANUAL -->
            <form action="{{ route('petugas.scan') }}" method="POST" class="manual">
                @csrf
                <div class="manual-title">Atau Input Kode Manual:</div>
                <div class="input-row">
                    <input type="text" name="kode_tiket" id="code" class="input-code" placeholder="CT - 8849" value="{{ request('kode_tiket') }}" required>
                    <button type="submit" class="check">CEK KODE</button>
                </div>
            </form>
        </div>

        <!-- PANEL KANAN -->
        <div class="right-panel">
            <div class="result-title">HASIL VALIDASI:</div>

            <div class="ticket">
                <div class="ticket-content">
                    @if(isset($ticket) && $ticket)
                        <div class="valid">TIKET VALID</div>
                        <p><strong>Tamu :</strong> {{ $ticket->nama ?? 'Pengunjung Ecopark' }}</p>
                        <p><strong>Item :</strong> {{ $ticket->name }} ({{ $ticket->quota }} orang)</p>
                    @elseif(request()->has('kode_tiket'))
                        <div class="valid invalid">TIDAK VALID</div>
                        <p style="color: #e11d48; font-weight: bold; margin-top: 10px;">Kode Tiket Tidak Ditemukan!</p>
                    @else
                        <div class="valid">TIKET VALID</div>
                        <p><strong>Tamu :</strong> Rina Anggraini</p>
                        <p><strong>Item :</strong> Rainbow Slide (2 orang)</p>
                    @endif
                </div>
                <div class="ticket-shape">
                    <span>TICKET</span>
                </div>
            </div>

            <a href="{{ route('petugas.gate') }}" style="text-decoration:none; width: 100%; max-width: 350px;">
                <button type="button" class="scan-again">SCAN TIKET LAGI</button>
            </a>
        </div>
    </div>
</div>

<script>
function toggleSidebar(){
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("hide");
}
</script>

</body>
</html>
