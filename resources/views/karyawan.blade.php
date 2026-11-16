 <!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Karyawan / Petugas - Ecopark Curug Tilu</title>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}
body{
    background:#e6ece8;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding: 24px;
}
.container{
    width:100%;
    max-width:950px;
    background:#fff;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
    padding: 30px;
    border: 2px solid #195a32;
}
.header-row{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    border-bottom: 2px solid #e9f2ea;
    padding-bottom: 15px;
}
h1{
    font-size: 20px;
    color: #195a32;
    font-weight: bold;
}
.back-btn{
    text-decoration: none;
    background: #e9f2ea;
    color: #195a32;
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: bold;
    transition: background 0.2s;
}
.back-btn:hover{
    background: #195a32;
    color: #fff;
}
.form-card{
    background: #f9fbf9;
    border: 1px solid #d5e2d9;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 30px;
}
.form-title{
    font-size: 14px;
    font-weight: bold;
    color: #195a32;
    margin-bottom: 15px;
}
.input-grid{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 15px;
}
.input-group label{
    display: block;
    font-size: 11px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}
.input-group input{
    width: 100%;
    height: 38px;
    border: 1px solid #c8d9ce;
    border-radius: 8px;
    padding: 0 12px;
    font-size: 12px;
    outline: none;
}
.input-group input:focus{
    border-color: #195a32;
}
.submit-btn{
    background: #195a32;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 10px 20px;
    font-size: 12px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.2s;
}
.submit-btn:hover{
    background: #124022;
}
.table-title{
    font-size: 14px;
    font-weight: bold;
    color: #195a32;
    margin-bottom: 10px;
}
table{
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    text-align: left;
}
th, td{
    padding: 12px 15px;
    font-size: 12px;
    border-bottom: 1px solid #eee;
}
th{
    background: #195a32;
    color: #fff;
    font-weight: bold;
}
th:first-child{ border-top-left-radius: 8px; }
th:last-child{ border-top-right-radius: 8px; }
tr:hover{ background: #f9fbf9; }
.empty-row{
    text-align: center;
    color: #777;
    font-style: italic;
    padding: 20px;
}
.action-group{
    display: flex;
    gap: 6px;
    justify-content: center;
}
.edit-btn{
    background: #2563eb;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 10px;
    cursor: pointer;
    font-weight: bold;
    text-decoration: none;
}
.edit-btn:hover{
    background: #1d4ed8;
}
.delete-btn{
    background: #e11d48;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 10px;
    cursor: pointer;
    font-weight: bold;
}
.delete-btn:hover{
    background: #be123c;
}
</style>
</head>
<body>

<div class="container">
    <div class="header-row">
        <h1>Data Karyawan / Petugas Ecopark Curug Tilu</h1>
        <!-- Tombol Kembali Dinamis ke Dashboard Manajer atau Admin -->
        <a href="{{ session('role') === 'manajer' ? route('manajer.dashboard') : route('admin.dashboard') }}" class="back-btn">
            ← Kembali ke Dashboard
        </a>
    </div>

    @if(session('success'))
        <div style="background: #e9f2ea; color: #195a32; padding: 10px 15px; border-radius: 8px; font-size: 12px; margin-bottom: 20px; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <!-- FORM TAMBAH KARYAWAN -->
    <div class="form-card">
        <div class="form-title">+ Tambah Petugas Baru</div>
        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf
            <div class="input-grid">
                <div class="input-group">
                    <label>Nama Petugas</label>
                    <input type="text" name="nama" placeholder="Masukkan nama..." required>
                </div>
                <div class="input-group">
                    <label>Jabatan / Bagian</label>
                    <input type="text" name="jabatan" placeholder="Contoh: Petugas Loket / Wahana" required>
                </div>
            </div>
            <button type="submit" class="submit-btn">Simpan Data Karyawan</button>
        </form>
    </div>

    <!-- TABEL DAFTAR KARYAWAN -->
    <div class="table-title">Daftar Petugas Aktif</div>
    <table>
        <thead>
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Karyawan</th>
                <th>Jabatan / Pos Penjagaan</th>
                <th style="width: 140px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($karyawanList as $index => $karyawan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $karyawan['nama'] }}</td>
                    <td>{{ $karyawan['jabatan'] }}</td>
                    <td style="text-align: center;">
                        <div class="action-group">
                            <!-- Tombol Edit yang Memanggil Modal -->
                            <button type="button" onclick="openEditModal('{{ $index }}', '{{ $karyawan['nama'] }}', '{{ $karyawan['jabatan'] }}')" class="edit-btn">Edit</button>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('karyawan.destroy', $index) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="empty-row">Belum ada data petugas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- MODAL POPUP EDIT KARYAWAN -->
<div id="editModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 1000;">
    <div style="background: #fff; padding: 25px; border-radius: 12px; width: 100%; max-width: 400px; border: 2px solid #195a32;">
        <div style="font-size: 14px; font-weight: bold; color: #195a32; margin-bottom: 15px;">Edit Data Petugas</div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 12px;">
                <label style="display: block; font-size: 11px; font-weight: bold; margin-bottom: 5px;">Nama Petugas</label>
                <input type="text" name="nama" id="editNama" style="width: 100%; height: 38px; border: 1px solid #c8d9ce; border-radius: 8px; padding: 0 12px; font-size: 12px;" required>
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 11px; font-weight: bold; margin-bottom: 5px;">Jabatan / Bagian</label>
                <input type="text" name="jabatan" id="editJabatan" style="width: 100%; height: 38px; border: 1px solid #c8d9ce; border-radius: 8px; padding: 0 12px; font-size: 12px;" required>
            </div>
            <div style="display: flex; gap: 10px; justify-content: flex-end;">
                <button type="button" onclick="closeEditModal()" style="background: #ccc; border: none; padding: 8px 14px; border-radius: 6px; font-size: 11px; font-weight: bold; cursor: pointer;">Batal</button>
                <button type="submit" style="background: #195a32; color: #fff; border: none; padding: 8px 14px; border-radius: 6px; font-size: 11px; font-weight: bold; cursor: pointer;">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(index, nama, jabatan) {
    const modal = document.getElementById('editModal');
    const form = document.getElementById('editForm');
    const inputNama = document.getElementById('editNama');
    const inputJabatan = document.getElementById('editJabatan');

    // Mengarahkan route update ke index array session yang sesuai
    form.action = "/karyawan/" + index;
    inputNama.value = nama;
    inputJabatan.value = jabatan;

    modal.style.display = 'flex';
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>

</body>
</html>
