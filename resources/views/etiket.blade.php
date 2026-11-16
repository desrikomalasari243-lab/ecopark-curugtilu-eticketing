<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Tiket Saya - Ecopark Curug Tilu</title>

    <!-- Library QR Code -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: #f1f3f5;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
        }

        .app {
            position: relative;
            width: 100%;
            min-height: 100vh;
            background: #1c5433;
            padding: 0 0 40px;
            color: #111;
        }

        .header {
            height: 80px;
            margin: 0 20px;
            border-bottom: 1px solid #91aa99;
            display: flex;
            align-items: center;
            position: relative;
        }

        .back-button {
            color: white;
            font-size: 38px;
            font-weight: bold;
            text-decoration: none;
            line-height: 1;
            margin-right: 17px;
            cursor: pointer;
        }

        .header-title {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .ticket-logo {
            position: absolute;
            right: 0;
            top: 20px;
            width: 50px;
            height: 44px;
            background: #70d653;
            transform: rotate(-10deg);
            clip-path: polygon(
                0 12%, 83% 0, 100% 18%,
                100% 85%, 83% 100%, 0 88%
            );
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #111;
            font-size: 9px;
            font-weight: bold;
            z-index: 2;
        }

        .ticket-logo span:last-child {
            border-top: 1px solid #111;
            padding-top: 2px;
            margin-top: 2px;
        }

        .ticket-card {
            width: 90%;
            max-width: 450px;
            min-height: 420px;
            margin: 30px auto 0;
            background: #d9f2df;
            padding: 25px 20px;
            position: relative;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        .ticket-code {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .ticket-status {
            font-size: 16px;
        }

        .dashed-line {
            border-top: 2px dashed #333;
            margin: 20px 0;
        }

        .qr-container {
            width: 150px;
            height: 150px;
            background: white;
            border: 2px dashed #111;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px;
        }

        #qrcode {
            width: 134px;
            height: 134px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #qrcode img,
        #qrcode canvas {
            width: 134px !important;
            height: 134px !important;
        }

        .ticket-date {
            font-size: 18px;
            font-weight: bold;
            margin-top: 30px;
            margin-left: 4px;
        }

        .date-line {
            border-top: 2px dashed #333;
            margin: 10px 4px;
        }

        .detail-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .detail-item {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            line-height: 28px;
        }

        .bottom-line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            border-top: 2px solid #333;
        }

        .side-dot {
            position: absolute;
            bottom: -3px;
            left: -2px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #333;
        }

        .side-dot.right {
            left: auto;
            right: -2px;
        }

        .pdf-button {
            position: relative;
            width: 90%;
            max-width: 450px;
            height: 55px;
            margin: 30px auto 0;
            background: #d9f2df;
            border: none;
            color: #111;
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            border-radius: 10px;
        }

        .download-icon {
            width: 25px;
            height: 25px;
            position: relative;
        }

        .download-icon::before {
            content: "";
            position: absolute;
            width: 3px;
            height: 15px;
            background: #111;
            left: 11px;
            top: 0;
        }

        .download-icon::after {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            border-right: 2px solid #111;
            border-bottom: 2px solid #111;
            transform: rotate(45deg);
            left: 7px;
            top: 6px;
        }

        .download-base {
            position: absolute;
            width: 24px;
            height: 7px;
            border: 2px solid #111;
            border-top: none;
            bottom: 0;
            left: 0;
        }

        @media (min-width: 768px) {
            body {
                background: #0f2d1e;
            }

            .app {
                max-width: 850px;
                min-height: 85vh;
                margin: 40px auto;
                border-radius: 24px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.4);
                overflow: hidden;
            }

            .ticket-card {
                max-width: 520px;
                padding: 35px 30px;
            }

            .pdf-button {
                max-width: 520px;
            }
        }

        @media print {
            body {
                background: white;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .app {
                max-width: 100%;
                margin: 0;
                box-shadow: none;
                border-radius: 0;
            }

            .pdf-button {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="app">

    <!-- HEADER -->
    <header class="header">
        <a href="{{ url('/dashboard-wisatawan') }}" class="back-button">‹</a>
        <div class="header-title">E-Tiket saya</div>
        <div class="ticket-logo">
            <span>✂ TIKET</span>
            <span>TICKET</span>
        </div>
    </header>

    <!-- KARTU TIKET -->
    <main class="ticket-card">
        <div class="ticket-code">Kode: {{ $ticketCode ?? '#ECT-2026111401' }}</div>
        <div class="ticket-status">Status : [AKTIF]</div>

        <div class="dashed-line"></div>

        <!-- QR CODE -->
        <div class="qr-container">
            <div id="qrcode"></div>
        </div>

        <!-- TANGGAL OTOMATIS REAL-TIME -->
        <div class="ticket-date">Tgl: {{ now()->format('d M Y') }}</div>
        <div class="date-line"></div>

        <!-- RINCIAN ITEM PEMBELIAN DINAMIS -->
        <div class="detail-title">Rincian</div>
        @if(isset($ticketItems) && is_array($ticketItems))
            @foreach($ticketItems as $item)
                <div class="detail-item">{{ $item }}</div>
            @endforeach
        @else
            <div class="detail-item">Tiket Masuk Utama (×1)</div>
        @endif

        <!-- GARIS BAWAH -->
        <div class="bottom-line"></div>
        <span class="side-dot"></span>
        <span class="side-dot right"></span>
    </main>

    <!-- SIMPAN PDF -->
    <button class="pdf-button" onclick="simpanPDF()">
        SIMPAN/UNDUH PDF
        <span class="download-icon">
            <span class="download-base"></span>
        </span>
    </button>

</div>

<script>
    const kodeTiket = "{{ $ticketCode ?? '#ECT-2026111401' }}";

    new QRCode(document.getElementById("qrcode"), {
        text: kodeTiket,
        width: 134,
        height: 134,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });

    function simpanPDF() {
        window.print();
    }
</script>

</body>
</html>
