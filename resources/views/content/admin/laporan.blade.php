<x-sidebar-admin title="Laporan Admin">
    <div class="container px-6 mx-auto grid">
        @if (session('success'))
        <div id="success-notification" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const notification = document.getElementById('success-notification');
                if (notification) {
                    setTimeout(() => {
                        notification.style.transition = 'opacity 0.5s ease-out';
                        notification.style.opacity = '0';
                        setTimeout(() => notification.remove(), 500);
                    }, 3000);
                }
            });
        </script>
        <div class="flex items-center justify-between my-6">
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Laporan Penjualan</h2>
        </div>
        <div class="bg-white p-4 rounded shadow-md mb-6">
            <h2 class="text-xl font-bold mb-4">Filter Laporan</h2>
            <form method="GET" action="{{ route('admin.laporan.index') }}" class="flex items-center space-x-4">
                <label class="font-semibold">Dari:</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="border p-2 rounded">
                <label class="font-semibold">Sampai:</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="border p-2 rounded">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow">Filter</button>
                <a href="{{ route('admin.laporan.index') }}" class="bg-orange-100 text-orange-700 px-4 py-2 rounded shadow  hover:bg-orange-500 hover:text-white transition duration-200">
                    Reset Filter
                </a>
                <button type="button" onclick="printLaporan()" class="bg-green-100 text-green-700 px-4 py-2 rounded shadow hover:bg-green-500 hover:text-white transition duration-200">
                    Cetak Laporan
                </button>
            </form>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            @if($penjualan->isEmpty())
                <p class="text-red-500 text-center">Tidak ada data transaksi dalam rentang tanggal yang dipilih.</p>
            @else
            <div id="laporan-container" class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID Penjualan</th>
                            <th class="px-4 py-3">Tanggal</th>
                            <th class="px-4 py-3">ID Pelanggan</th>
                            <th class="px-4 py-3">Total Harga</th>
                            <th class="px-4 py-3">Bayar</th>
                            <th class="px-4 py-3">Kembalian</th>
                            <th class="px-4 py-3">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($penjualan as $p)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">{{ $p->id_penjualan }}</td>
                            <td class="px-4 py-3 text-sm">{{ $p->tanggal_penjualan }}</td>
                            <td class="px-4 py-3 text-sm">{{ $p->id_pelanggan }}</td>
                            <td class="px-4 py-3 text-sm">Rp{{ number_format($p->total_harga, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm">Rp{{ number_format($p->bayar, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm">Rp{{ number_format($p->kembalian, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('admin.laporan.show', $p->id_penjualan) }}">
                                    <button class="bg-blue-500 text-white px-3 py-1 rounded">Detail</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
    <script>
        function printLaporan() {
            let laporanContainer = document.getElementById("laporan-container").innerHTML;
            let printWindow = window.open('', '_blank');
            
            printWindow.document.write(`
                <html>
                <head>
                    <title>Cetak Laporan</title>
                    <style>
                        body { font-family: Arial, sans-serif; text-align: center; }
                        table { width: 100%; border-collapse: collapse; }
                        th, td { border: 1px solid black; padding: 8px; text-align: center; }
                        th { background-color: #f2f2f2; }
                    </style>
                </head>
                <body>
                    <h2>Laporan Penjualan</h2>
                    ${laporanContainer}
                </body>
                </html>
            `);

            printWindow.document.close();
            printWindow.print();
        }
    </script>
</x-sidebar-admin>