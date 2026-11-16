<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan & Statistik - Ecopark Curug Tilu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#c2e2c2] min-h-screen p-6 font-sans text-[#1b3b2b]">

    <div class="max-w-5xl mx-auto bg-white rounded-3xl p-8 shadow-xl border border-gray-300 space-y-6">

        <!-- Header Halaman -->
        <div class="flex justify-between items-center border-b border-gray-200 pb-4">
            <div>
                <h1 class="text-2xl font-bold text-[#1b3b2b]">📊 Laporan & Statistik Bulanan</h1>
                <p class="text-xs text-gray-500 mt-1">Rekapitulasi data pengunjung dan performa wahana Ecopark Curug Tilu.</p>
            </div>
            <a href="{{ route('manajer.dashboard') }}" class="bg-[#1b3b2b] text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-opacity-90 transition">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Info Ringkas -->
        <div class="bg-[#194f31] text-white p-4 rounded-xl text-sm font-semibold flex justify-between items-center">
            <span>Total Jenis Tiket Terdaftar di Sistem: {{ count($tikets) }} jenis</span>
            <span>Periode: September 2026</span>
        </div>

        <!-- Tabel Rekapitulasi Laporan -->
        <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-[#1b3b2b] text-white">
                        <th class="py-3 px-4 text-center w-12">No</th>
                        <th class="py-3 px-4">Jenis Tiket / Wahana</th>
                        <th class="py-3 px-4 text-center">Terjual</th>
                        <th class="py-3 px-4">Subtotal Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tikets as $index => $t)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4 text-center font-medium">{{ $index + 1 }}</td>
                            <td class="py-3 px-4 font-semibold">{{ $t->name ?? $t->nama_tiket ?? 'Tiket Masuk Ecopark' }}</td>
                            <td class="py-3 px-4 text-center">{{ number_format($t->quota ?? $t->stok ?? 1200, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 font-bold text-green-700">Rp {{ number_format(($t->price ?? $t->harga ?? 25000) * 120, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-6 text-center text-gray-500">Belum ada data laporan penjualan tiket.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
