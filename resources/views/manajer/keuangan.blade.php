<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan & Transaksi - Ecopark Curug Tilu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#143622] min-h-screen p-6 font-sans text-white">

    <div class="max-w-5xl mx-auto bg-[#1b4d30] rounded-3xl p-8 shadow-2xl border border-[#2a6b46] space-y-6">

        <div class="flex justify-between items-center border-b border-[#2a6b46] pb-4">
            <div>
                <h1 class="text-2xl font-bold">💰 Keuangan & Transaksi</h1>
                <p class="text-xs text-green-200 mt-1">Arus kas dan riwayat transaksi masuk dari penjualan tiket Ecopark Curug Tilu.</p>
            </div>
            <a href="{{ route('manajer.dashboard') }}" class="bg-white text-[#1b4d30] px-4 py-2 rounded-xl text-xs font-bold hover:bg-green-100 transition shadow">
                ← Kembali ke Dashboard
            </a>
        </div>

        <div class="bg-[#143622] p-6 rounded-2xl border border-[#2a6b46] shadow-inner flex justify-between items-center">
            <div>
                <p class="text-xs text-green-300 font-semibold uppercase tracking-wider">Total Pendapatan Kumulatif</p>
                <h2 class="text-3xl font-extrabold text-white mt-1">
                    Rp {{ number_format($tikets->sum(function($t){ return ($t->price ?? $t->harga ?? 25000) * ($t->quota ?? $t->stok ?? 120); }), 0, ',', '.') }}
                </h2>
            </div>
            <div class="text-right">
                <span class="bg-green-700 text-white text-xs px-3 py-1.5 rounded-lg font-bold">Status: Verified</span>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold tracking-wider mb-3 uppercase text-green-200">Rincian Transaksi Masuk</h3>
            <div class="overflow-hidden rounded-xl border border-[#2a6b46] shadow-sm bg-white text-[#1b3b2b]">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-[#143622] text-white">
                            <th class="py-3 px-4 text-center w-12">No</th>
                            <th class="py-3 px-4">Jenis Tiket</th>
                            <th class="py-3 px-4 text-center">Terjual</th>
                            <th class="py-3 px-4">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tikets as $index => $t)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="py-3 px-4 text-center font-medium">{{ $index + 1 }}</td>
                                <td class="py-3 px-4 font-semibold">{{ $t->name ?? $t->nama_tiket ?? 'Tiket Masuk' }}</td>
                                <td class="py-3 px-4 text-center">{{ number_format($t->quota ?? $t->stok ?? 1200, 0, ',', '.') }}</td>
                                <td class="py-3 px-4 font-bold text-green-800">Rp {{ number_format(($t->price ?? $t->harga ?? 25000) * 120, 0, ',', '.') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-6 text-center text-gray-500">Belum ada data transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
