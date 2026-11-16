<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - Ecopark Curug Tilu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#c2e2c2] min-h-screen p-6 font-sans text-[#1b3b2b]">

    <div class="max-w-3xl mx-auto bg-white rounded-3xl p-8 shadow-xl border border-gray-300 space-y-6">

        <div class="flex justify-between items-center border-b border-gray-200 pb-4">
            <div>
                <h1 class="text-2xl font-bold text-[#1b3b2b]">⚙️ Pengaturan Akun Manajer</h1>
                <p class="text-xs text-gray-500 mt-1">Kelola informasi profil dan kredensial akun sistem.</p>
            </div>
            <a href="{{ route('manajer.dashboard') }}" class="bg-[#1b3b2b] text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-opacity-90 transition">
                ← Kembali
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl text-xs">
                {{ session('success') }}
            </div>
        @endif

        <form action="#" method="POST" class="space-y-4 text-xs">
            @csrf
            <div>
                <label class="block font-bold mb-1 text-gray-700">Nama Lengkap / Jabatan</label>
                <input type="text" name="name" value="Manajer Ecopark Curug Tilu" class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#1b3b2b]">
            </div>
            <div>
                <label class="block font-bold mb-1 text-gray-700">Email Akun</label>
                <input type="email" name="email" value="manajer@ecopark.com" class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#1b3b2b]">
            </div>
            <div>
                <label class="block font-bold mb-1 text-gray-700">Password Baru (Opsional)</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#1b3b2b]">
            </div>
            <button type="submit" class="w-full bg-[#1b3b2b] text-white py-3 rounded-xl font-bold hover:bg-opacity-90 transition">
                Simpan Perubahan
            </button>
        </form>

    </div>

</body>
</html>
