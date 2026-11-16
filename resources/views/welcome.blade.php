<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecopark Curug Tilu - Katalog Wisatawan</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body{
            background: #020617;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }
        .container{
            width: 100%;
            max-width: 950px;
            background: #195a32;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
            padding: 35px;
            color: #fff;
        }
        .greeting-box{
            margin-bottom: 25px;
        }
        .greeting-title{
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .info-row{
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        .info-badge{
            background: #e9f2ea;
            color: #195a32;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .section-title{
            font-size: 16px;
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 8px;
        }
        .catalog-grid{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }
        .catalog-card{
            background: #fff;
            color: #222;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .catalog-card h3{
            font-size: 15px;
            color: #195a32;
            margin-bottom: 8px;
        }
        .catalog-card p{
            font-size: 12px;
            color: #555;
            margin-bottom: 15px;
        }
        .order-btn{
            background: #195a32;
            color: #fff;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background 0.2s;
        }
        .order-btn:hover{
            background: #124022;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- GREETING & INFO OTOMATIS -->
    <div class="greeting-box">
        <div class="greeting-title">Halo, Wisatawan!</div>
        <div class="info-row">
            <div class="info-badge">
                Info Buka : 07:00 - 19:00
            </div>
            <!-- TANGGAL OTOMATIS MENGIKUTI HARI INI -->
            <div class="info-badge">
                Tanggal Kunjungan : {{ date('d - m - Y') }}
            </div>
        </div>
    </div>

    <!-- KATALOG TIKET & WAHANA -->
    <div class="section-title">KATALOG TIKET & WAHANA ECOPARK CURUG TILU</div>

    <div class="catalog-grid">
        <!-- Item 1 -->
        <div class="catalog-card">
            <div>
                <h3>Tiket Masuk Utama</h3>
                <p>Akses masuk ke area wisata alam Ecopark Curug Tilu Rancabali.</p>
            </div>
            <a href="#" class="order-btn">Pilih Tiket</a>
        </div>

        <!-- Item 2 -->
        <div class="catalog-card">
            <div>
                <h3>Wahana Rainbow Slide</h3>
                <p>Sensasi meluncur seru di atas seluncuran warna-warni yang ikonik.</p>
            </div>
            <a href="#" class="order-btn">Pilih Wahana</a>
        </div>

        <!-- Item 3 -->
        <div class="catalog-card">
            <div>
                <h3>Paket Foto & Area Bermain</h3>
                <p>Bundling tiket masuk lengkap dengan opsi kuota foto dan wahana pendukung.</p>
            </div>
            <a href="#" class="order-btn">Pilih Paket</a>
        </div>
    </div>
</div>

</body>
</html>
