<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Tiket & Wahana - Ecopark Curug Tilu</title>
    <!-- CDN Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 min-h-screen font-sans flex justify-center items-center p-0 md:py-10">

    <!-- Container Utama dibungkus Form POST agar data pesanan terkirim -->
    <form action="{{ route('beli.tiket') }}" method="POST" class="w-full min-h-screen md:min-h-0 md:max-w-4xl bg-[#1b4332] rounded-none md:rounded-[32px] text-white flex flex-col shadow-2xl relative overflow-hidden md:h-[85vh]">
        @csrf

        <!-- HEADER / KONTEN UTAMA DENGAN SCROLL KE BAWAH -->
        <div class="px-6 pt-6 pb-28 md:pb-32 flex-1 overflow-y-auto space-y-4">

            <!-- Sapaan & Info Atas -->
            <div class="space-y-2">
                <h1 class="text-xl md:text-2xl font-extrabold text-white">Halo, Wisatawan!</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <!-- Kotak Info Buka -->
                    <div class="bg-[#d8f3dc] text-slate-900 px-4 py-2.5 rounded-xl text-xs font-bold shadow-sm flex items-center">
                        <span>Info Buka : 07:00 - 19.00</span>
                    </div>

                    <!-- Kotak Tanggal Kunjungan (Sudah Otomatis Real-Time) -->
                    <div class="bg-[#d8f3dc] text-slate-900 px-4 py-2.5 rounded-xl text-xs font-bold shadow-sm flex items-center">
                        <span>Tanggal Kunjungan : {{ date('d - m - Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- JUDUL KATALOG -->
            <div class="pt-2">
                <h2 class="text-xs md:text-sm font-black tracking-wider uppercase text-white">KATALOG TIKET & WAHANA</h2>
                <div class="border-t border-dashed border-emerald-500/60 w-full mt-1.5"></div>
            </div>

            <!-- GRID DAFTAR TIKET -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pb-6">

                <!-- 1. TIKET MASUK UTAMA -->
                <div class="space-y-2 md:col-span-2">
                    <h3 class="text-xs md:text-sm font-bold text-white">Tiket Masuk Utama</h3>

                    <!-- Kartu Item Tiket -->
                    <div class="ticket-item bg-[#d8f3dc] text-slate-900 p-3.5 rounded-xl shadow-sm border border-emerald-900/20 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-amber-200 rounded-lg flex items-center justify-center p-1 border border-amber-400">
                                <!-- Icon Tiket -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-amber-800" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 10V6a2 2 0 0 0-2-2H4c-1.1 0-2 .9-2 2v4c1.1 0 2 .9 2 2s-.9 2-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4c-1.1 0-2-.9-2-2s.9-2 2-2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs md:text-sm font-bold text-slate-900">Tiket Masuk Ecopark</p>
                                <p class="text-xs md:text-sm font-extrabold text-slate-800">Rp25.000 / orang</p>
                            </div>
                        </div>

                        <!-- Tombol Counter & Hidden Input untuk qty_masuk -->
                        <div class="bg-white px-3 py-1.5 rounded-lg border border-slate-300 flex items-center space-x-3 text-xs md:text-sm font-bold text-slate-900 shadow-xs">
                            <button type="button" class="btn-minus cursor-pointer text-slate-500 hover:text-black px-1">-</button>
                            <span class="qty-val px-1" data-price="25000">2</span>
                            <input type="hidden" name="qty_masuk" id="input_qty_masuk" value="2">
                            <button type="button" class="btn-plus cursor-pointer text-slate-500 hover:text-black px-1">+</button>
                        </div>
                    </div>
                </div>

                <div class="border-t border-dashed border-emerald-500/40 w-full md:col-span-2"></div>

                <!-- 2. TIKET WAHANA & AKTIVITAS -->
                <div class="space-y-2.5 md:col-span-2">
                    <h3 class="text-xs md:text-sm font-bold text-white">2. Tiket Wahana & Aktivitas</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <!-- Wahana 1: Rainbow Slide -->
                        <div class="ticket-item bg-[#d8f3dc] text-slate-900 p-3.5 rounded-xl shadow-sm border border-emerald-900/20 flex items-center justify-between md:flex-col md:items-start md:space-y-3">
                            <div class="flex items-center space-x-3 md:space-x-0 md:space-y-2 md:flex-col md:items-start">
                                <div class="w-10 h-10 bg-sky-200 rounded-lg flex items-center justify-center p-1 border border-sky-400">
                                    <span class="text-xs font-black text-sky-900">🌈</span>
                                </div>
                                <div>
                                    <p class="text-xs md:text-sm font-bold text-slate-900">Rainbow Slide</p>
                                    <p class="text-[10px] md:text-xs text-slate-600 font-medium">(1 kali meluncur)</p>
                                    <p class="text-xs md:text-sm font-extrabold text-slate-800 mt-0.5">Rp 30.000</p>
                                </div>
                            </div>
                            <div class="bg-white px-3 py-1.5 rounded-lg border border-slate-300 flex items-center space-x-3 text-xs md:text-sm font-bold text-slate-900 shadow-xs md:w-full md:justify-between">
                                <span class="text-xs text-slate-500 hidden md:inline">Jumlah:</span>
                                <div class="flex items-center space-x-3">
                                    <button type="button" class="btn-minus cursor-pointer text-slate-500 hover:text-black px-1">-</button>
                                    <span class="qty-val px-1" data-price="30000">1</span>
                                    <input type="hidden" name="qty_rainbow" id="input_qty_rainbow" value="1">
                                    <button type="button" class="btn-plus cursor-pointer text-slate-500 hover:text-black px-1">+</button>
                                </div>
                            </div>
                        </div>

                        <!-- Wahana 2: Playground Anak -->
                        <div class="ticket-item bg-[#d8f3dc] text-slate-900 p-3.5 rounded-xl shadow-sm border border-emerald-900/20 flex items-center justify-between md:flex-col md:items-start md:space-y-3">
                            <div class="flex items-center space-x-3 md:space-x-0 md:space-y-2 md:flex-col md:items-start">
                                <div class="w-10 h-10 bg-pink-200 rounded-lg flex items-center justify-center p-1 border border-pink-400">
                                    <span class="text-xs font-black text-pink-900">🎠</span>
                                </div>
                                <div>
                                    <p class="text-xs md:text-sm font-bold text-slate-900">Playground Anak</p>
                                    <p class="text-[10px] md:text-xs text-slate-600 font-medium opacity-0">spacer</p>
                                    <p class="text-xs md:text-sm font-extrabold text-slate-800 mt-0.5">Rp 40.000</p>
                                </div>
                            </div>
                            <div class="bg-white px-3 py-1.5 rounded-lg border border-slate-300 flex items-center space-x-3 text-xs md:text-sm font-bold text-slate-900 shadow-xs md:w-full md:justify-between">
                                <span class="text-xs text-slate-500 hidden md:inline">Jumlah:</span>
                                <div class="flex items-center space-x-3">
                                    <button type="button" class="btn-minus cursor-pointer text-slate-500 hover:text-black px-1">-</button>
                                    <span class="qty-val px-1" data-price="40000">0</span>
                                    <input type="hidden" name="qty_playground" id="input_qty_playground" value="0">
                                    <button type="button" class="btn-plus cursor-pointer text-slate-500 hover:text-black px-1">+</button>
                                </div>
                            </div>
                        </div>

                        <!-- Wahana 3: Paket Jeep Offroad -->
                        <div class="ticket-item bg-[#d8f3dc] text-slate-900 p-3.5 rounded-xl shadow-sm border border-emerald-900/20 flex items-center justify-between md:flex-col md:items-start md:space-y-3">
                            <div class="flex items-center space-x-3 md:space-x-0 md:space-y-2 md:flex-col md:items-start">
                                <div class="w-10 h-10 bg-stone-300 rounded-lg flex items-center justify-center p-1 border border-stone-500">
                                    <span class="text-xs font-black text-stone-900">🚙</span>
                                </div>
                                <div>
                                    <p class="text-xs md:text-sm font-bold text-slate-900">Paket Jeep Offroad</p>
                                    <p class="text-[10px] md:text-xs text-slate-600 font-medium">(kebun teh)</p>
                                    <p class="text-xs md:text-sm font-extrabold text-slate-800 mt-0.5">Rp 350.000 / paket</p>
                                </div>
                            </div>
                            <div class="bg-white px-3 py-1.5 rounded-lg border border-slate-300 flex items-center space-x-3 text-xs md:text-sm font-bold text-slate-900 shadow-xs md:w-full md:justify-between">
                                <span class="text-xs text-slate-500 hidden md:inline">Jumlah:</span>
                                <div class="flex items-center space-x-3">
                                    <button type="button" class="btn-minus cursor-pointer text-slate-500 hover:text-black px-1">-</button>
                                    <span class="qty-val px-1" data-price="350000">1</span>
                                    <input type="hidden" name="qty_jeep" id="input_qty_jeep" value="1">
                                    <button type="button" class="btn-plus cursor-pointer text-slate-500 hover:text-black px-1">+</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <!-- FOOTER: TOTAL & TOMBOL PESAN & BAYAR -->
        <div class="absolute bottom-0 left-0 w-full bg-[#d8f3dc] text-slate-900 pt-3 pb-5 px-6 md:px-10 shadow-2xl border-t border-emerald-900/10 z-20 flex flex-col md:flex-row md:items-center md:justify-between">
            <!-- Indikator Titik -->
            <div class="flex justify-center space-x-1 mb-2 md:hidden">
                <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span>
                <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span>
                <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span>
            </div>

            <!-- Total Harga -->
            <div class="flex items-center justify-between mb-3 md:mb-0 px-1 md:space-x-6">
                <span class="text-sm md:text-base font-extrabold text-slate-900">Total Pembayaran:</span>
                <span id="total-harga" class="text-base md:text-xl font-black text-slate-900">Rp 430.000</span>
            </div>

            <!-- TOMBOL PESAN & BAYAR -->
            <button type="submit" class="w-full md:w-auto md:px-10 py-3.5 bg-[#1b4332] hover:bg-[#133124] text-white font-black text-xs md:text-sm rounded-xl shadow-md transition flex items-center justify-center tracking-wider uppercase border border-dashed border-emerald-400 cursor-pointer">
                PESAN & BAYAR
            </button>
        </div>

    </form>

    <!-- SCRIPT JAVASCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('.ticket-item');
            const hiddenInputs = ['input_qty_masuk', 'input_qty_rainbow', 'input_qty_playground', 'input_qty_jeep'];

            items.forEach((item, index) => {
                const btnMinus = item.querySelector('.btn-minus');
                const btnPlus = item.querySelector('.btn-plus');
                const qtySpan = item.querySelector('.qty-val');
                const hiddenInput = document.getElementById(hiddenInputs[index]);

                if (btnMinus && btnPlus && qtySpan) {
                    btnPlus.addEventListener('click', () => {
                        let qty = parseInt(qtySpan.textContent);
                        qty++;
                        qtySpan.textContent = qty;
                        if(hiddenInput) hiddenInput.value = qty;
                        hitungTotalKeseluruhan();
                    });

                    btnMinus.addEventListener('click', () => {
                        let qty = parseInt(qtySpan.textContent);
                        if (qty > 0) {
                            qty--;
                            qtySpan.textContent = qty;
                            if(hiddenInput) hiddenInput.value = qty;
                            hitungTotalKeseluruhan();
                        }
                    });
                }
            });

            function hitungTotalKeseluruhan() {
                let total = 0;
                const qtySpans = document.querySelectorAll('.qty-val');

                qtySpans.forEach(span => {
                    const qty = parseInt(span.textContent);
                    const price = parseInt(span.getAttribute('data-price'));
                    total += qty * price;
                });

                const formattedTotal = 'Rp ' + total.toLocaleString('id-ID');
                document.getElementById('total-harga').textContent = formattedTotal;
            }

            hitungTotalKeseluruhan();
        });
    </script>

</body>
</html>
