<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas / Admin / Manajer - Ecopark Curug Tilu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 min-h-screen font-sans flex justify-center items-center p-0 md:p-6">

    <div class="w-full min-h-screen md:min-h-0 md:max-w-4xl bg-[#1b4332] rounded-none md:rounded-[32px] text-white flex flex-col md:flex-row shadow-2xl relative overflow-hidden">

        <!-- BAGIAN KIRI: Logo & Judul -->
        <div class="bg-[#d8f3dc] text-slate-900 pt-14 pb-12 px-6 md:w-1/2 md:py-20 flex flex-col items-center justify-center rounded-b-[48px] md:rounded-bl-[32px] md:rounded-tr-none shadow-sm">
            <div class="w-16 h-16 md:w-24 md:h-24 mb-3 flex items-center justify-center overflow-hidden bg-white rounded-full shadow-sm border border-[#1b4332]/15 p-1">
                <img src="{{ asset('images/logo-ecopark.jpeg') }}" alt="Logo Ecopark Curugtilu" class="w-full h-full object-cover rounded-full">
            </div>
            <h1 class="text-base md:text-xl font-black tracking-wide text-slate-900 uppercase">Ecopark Curugtilu</h1>
            <p class="text-xs md:text-sm font-bold tracking-widest text-slate-500 uppercase mt-0.5">PORTAL PETUGAS</p>
        </div>

        <!-- BAGIAN KANAN: Form Login Ber-Password -->
        <div class="px-7 py-6 md:w-1/2 md:px-10 md:flex md:flex-col md:justify-center flex flex-col space-y-4">

            <div>
                <h2 class="text-xl md:text-2xl font-extrabold text-white">Login Pengelola</h2>
                <p class="text-xs md:text-sm text-emerald-200/80 mt-0.5">Masukkan email dan password Anda</p>
            </div>

            <!-- TAMPILAN ERROR JIKA GAGAL -->
            @if ($errors->any())
                <div class="bg-red-500/20 border border-red-500 text-red-200 px-4 py-3 rounded-xl text-xs">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- FORM LOGIN PETUGAS (MENGARAH KE rute login.petugas.process) -->
            <form action="{{ route('login.petugas.process') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Input Email -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-white">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="email@petugas.com" class="w-full bg-[#d8f3dc] border-0 px-4 py-3.5 rounded-xl text-xs font-medium text-slate-900 placeholder-slate-500 focus:outline-none shadow-sm">
                </div>

                <!-- Input Password -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-white">Password</label>
                    <input type="password" name="password" required placeholder="••••••••" class="w-full bg-[#d8f3dc] border-0 px-4 py-3.5 rounded-xl text-xs font-medium text-slate-900 placeholder-slate-500 focus:outline-none shadow-sm">
                </div>

                <!-- Tombol Masuk -->
                <div class="space-y-3 pt-2">
                    <button type="submit" class="w-full py-4 bg-[#d8f3dc] hover:bg-[#b7e4c7] border border-dashed border-slate-900 text-slate-950 font-black text-sm rounded-xl shadow-md transition flex items-center justify-center tracking-wider cursor-pointer">
                        MASUK DASHBOARD
                    </button>

                    <div class="text-center pt-1">
                        <a href="{{ url('/') }}" class="text-xs text-emerald-200 hover:underline font-medium">
                            ← Kembali ke Beranda Wisatawan
                        </a>
                    </div>
                </div>

            </form>

        </div>

    </div>

</body>
</html>
