<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manajemen Tiket & Kuota - Ecopark Curug Tilu</title>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
body { background: #020617; min-height: 100vh; padding: 30px 15px; }
.dashboard { width: 100%; max-width: 1290px; min-height: 100vh; margin: auto; background: #d8f2dc; border-radius: 35px 35px 0 0; overflow: hidden; position: relative; color: #1b3b2b; }
.header { height: 122px; background: #ccebd3; border-bottom: 1px solid #164c30; display: flex; align-items: center; justify-content: space-between; padding: 0 45px; position: relative; z-index: 5; }
.header-left { display: flex; align-items: center; gap: 35px; }
.header-logo { width: 65px; height: 65px; border-radius: 50%; border: 3px solid #174b30; background: white; object-fit: contain; padding: 3px; }
.header h1 { color: #174b30; font-size: 30px; }
.back-btn { text-decoration: none; background: #194f31; color: white; padding: 10px 20px; border-radius: 12px; font-weight: bold; font-size: 15px; }
.back-btn:hover { background: #123823; }
.content { padding: 30px 45px 40px; display: grid; grid-template-columns: 1fr 1.4fr; gap: 30px; }
.form-box { background: #194f31; padding: 30px; border-radius: 25px; color: white; box-shadow: 0 6px 10px #0002; }
.form-title { font-size: 20px; font-weight: bold; margin-bottom: 20px; }
.form-group { margin-bottom: 20px; }
.form-group label { display: block; margin-bottom: 8px; font-weight: bold; font-size: 15px; }
.form-group input { width: 100%; padding: 12px 15px; border-radius: 10px; border: none; font-size: 15px; }
.btn-submit { background: #d8f2dc; color: #194f31; border: none; width: 100%; padding: 14px; border-radius: 12px; font-weight: bold; font-size: 16px; cursor: pointer; transition: 0.2s; }
.btn-submit:hover { background: #ccebd3; }
.table-box { background: #194f31; padding: 30px; border-radius: 25px; color: white; box-shadow: 0 6px 10px #0002; overflow-x: auto; }
table { width: 100%; border-collapse: collapse; background: white; color: #1b3b2b; border-radius: 10px; overflow: hidden; }
th { background: #123823; color: white; text-align: left; padding: 14px; font-size: 16px; }
td { border: 1px solid #ccd5df; padding: 12px; font-size: 15px; }
th:first-child, td:first-child { text-align: center; width: 10%; }
.btn-edit { background: #ffc107; color: #000; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-weight: bold; font-size: 13px; display: inline-block; margin-right: 4px; }
.btn-delete { background: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-weight: bold; font-size: 13px; cursor: pointer; }
.alert-success { background: #d4edda; color: #155724; padding: 12px 20px; border-radius: 10px; margin-bottom: 20px; font-weight: bold; }
</style>
</head>
<body>

<div class="dashboard">
    <header class="header">
        <div class="header-left">
            <img src="{{ asset('images/logo-ecopark.jpeg') }}" class="header-logo" alt="Logo Ecopark">
            <h1>Manajemen Tiket & Kuota</h1>
        </div>
        <a href="{{ route('manajer.dashboard') }}" class="back-btn">← Kembali ke Dashboard</a>
    </header>

    <div class="content">
        <!-- FORM TAMBAH / EDIT TIKET -->
        <div class="form-box">
            <div class="form-title">
                {{ isset($tiket) ? 'Edit Item Tiket & Kuota' : 'Tambah Tiket & Kuota Baru' }}
            </div>

            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ isset($tiket) ? url('/manajer/kelola-tiket/' . $tiket->id) : url('/manajer/kelola-tiket') }}" method="POST">
                @csrf
                @if(isset($tiket))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label>Nama Wahana / Tiket:</label>
                    <input type="text" name="name" value="{{ $tiket->name ?? old('name') }}" placeholder="Contoh: Flying Fox" required>
                </div>

                <div class="form-group">
                    <label>Harga (Rp):</label>
                    <input type="number" name="price" value="{{ $tiket->price ?? old('price') }}" placeholder="Contoh: 25000" required>
                </div>

                <div class="form-group">
                    <label>Kuota Harian:</label>
                    <input type="number" name="quota" value="{{ $tiket->quota ?? old('quota') }}" placeholder="Contoh: 300" required>
                </div>

                <button type="submit" class="btn-submit">
                    {{ isset($tiket) ? 'PERBARUI DATA TIKET' : 'SIMPAN TIKET BARU' }}
                </button>

                @if(isset($tiket))
                    <a href="{{ url('/manajer/kelola-tiket') }}" style="display: block; text-align: center; margin-top: 15px; color: #ffd700; text-decoration: none; font-weight: bold;">Batal Edit</a>
                @endif
            </form>
        </div>

        <!-- TABEL DAFTAR TIKET -->
        <div class="table-box">
            <div class="form-title">Daftar Item Tiket & Kuota</div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tiket</th>
                        <th>Harga</th>
                        <th>Kuota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tikets as $index => $t)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $t->name }}</td>
                        <td>Rp {{ number_format($t->price, 0, ',', '.') }}</td>
                        <td>{{ $t->quota }} orang</td>
                        <td>
                            <a href="{{ url('/manajer/kelola-tiket/' . $t->id . '/edit') }}" class="btn-edit">Ubah</a>
                            <form action="{{ url('/manajer/kelola-tiket/' . $t->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus tiket ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 20px;">Belum ada data tiket.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
