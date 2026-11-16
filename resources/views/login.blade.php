<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Pilih Peran - Ecopark Curug Tilu</title>
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
            <p class="text-xs md:text-sm font-bold tracking-widest text-slate-500 uppercase mt-0.5">E-TICKETING</p>
        </div>

        <!-- BAGIAN KANAN: Form Pilihan Peran & Login -->
        <div class="px-7 py-6 md:w-1/2 md:px-10 md:flex md:flex-col md:justify-center flex flex-col space-y-4">

            <div>
                <h2 class="text-xl md:text-2xl font-extrabold text-white">Selamat Datang!</h2>
                <p class="text-xs md:text-sm text-emerald-200/80 mt-0.5">Silakan pilih peran untuk masuk</p>
            </div>

            <!-- FORM UTAMA -->
            <form id="mainLoginForm" action="{{ route('login.process') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Pilihan Peran -->
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-white tracking-wide">Pilih peran</label>

                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="peran" value="wisatawan" class="w-4 h-4 text-emerald-500 accent-white role-option" checked>
                        <span class="text-sm font-bold text-white">Wisatawan</span>
                    </label>

                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="peran" value="petugas_gate" class="w-4 h-4 text-emerald-500 accent-white role-option">
                        <span class="text-sm font-bold text-white">Petugas Gate</span>
                    </label>

                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="peran" value="admin" class="w-4 h-4 text-emerald-500 accent-white role-option">
                        <span class="text-sm font-bold text-white">Admin</span>
                    </label>

                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input type="radio" name="peran" value="manajer" class="w-4 h-4 text-emerald-500 accent-white role-option">
                        <span class="text-sm font-bold text-white">Manajer</span>
                    </label>
                </div>

                <div class="border-t border-emerald-700/60 w-full pt-1"></div>

                <!-- Input Username (Hanya untuk Wisatawan) -->
                <div id="usernameBox" class="space-y-1.5">
                    <label class="block text-xs font-bold text-white">Username</label>
                    <input type="text" name="username" id="usernameInput" placeholder="Masukkan Username....." class="w-full bg-[#d8f3dc] border-0 px-4 py-4 rounded-xl text-xs font-medium text-slate-900 placeholder-slate-500 focus:outline-none shadow-sm">
                </div>

                <!-- Tombol Masuk -->
                <div class="space-y-3 pt-2">
                    <button type="submit" id="submitButton" class="w-full py-4 bg-[#d8f3dc] hover:bg-[#b7e4c7] border border-dashed border-slate-900 text-slate-950 font-black text-sm rounded-xl shadow-md transition flex items-center justify-center tracking-wider cursor-pointer">
                        MASUK
                    </button>
                    <p id="infoText" class="text-[11px] text-center text-emerald-200/70 font-light">Akses cepat tanpa password untuk wisatawan</p>
                </div>

            </form>

        </div>

    </div>

    <script>
        const roleOptions = document.querySelectorAll('.role-option');
        const mainLoginForm = document.getElementById('mainLoginForm');
        const usernameBox = document.getElementById('usernameBox');
        const usernameInput = document.getElementById('usernameInput');
        const infoText = document.getElementById('infoText');

        roleOptions.forEach(option => {
            option.addEventListener('change', function() {
                if (this.value === 'wisatawan') {
                    // Jika Wisatawan, arahkan ke login biasa tanpa password
                    mainLoginForm.action = "{{ route('login.process') }}";
                    usernameBox.style.display = 'block';
                    usernameInput.required = true;
                    infoText.textContent = "Akses cepat tanpa password untuk wisatawan";
                } else {
                    // Jika Petugas/Admin/Manajer, arahkan langsung ke halaman login ber-password
                    window.location.href = "{{ route('login.petugas') }}";
                }
            });
        });
    </script>

</body>
</html>
