<x-petugas.app title="Menu Generate Laporan">
    <!-- Main Content -->
    <div class="flex-1 p-6 min-h-screen rounded bg-cover bg-opacity-70 bg-center backdrop-blur-lg" 
        style="background-image: url('https://i.pinimg.com/736x/c8/a1/8b/c8a18bc6cd711598ea5e274c8a7a6d64.jpg');">
        
        <!-- Header -->
        <div class="flex justify-between items-center mb-6 bg-[#F1F0E9] bg-opacity-0 p-4 rounded shadow-md backdrop-blur-lg">
            <div class="flex items-center bg-white p-2 rounded shadow-sm w-1/2">
                <input class="flex-1 p-2 outline-none" placeholder="Search" type="text" />
                <i class="fas fa-search text-gray-600"></i>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <span class="text-gray-600">{{ Auth()->user()->usernama }}</span>
                    <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('storage/public/profiles/default.png') }}" alt="Profile petugas kasir" class="w-10 h-10 rounded-full" />
                </div>
            </div>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
            <div id="success-alert" class="mb-4 p-4 bg-green-500 text-white rounded shadow-md">
                {{ session('success') }}
            </div>
        @endif
        <script>
            setTimeout(() => {
                document.getElementById('success-alert')?.remove();
            }, 3000);
        </script>        

        <!-- Filter Laporan -->
        <div class="bg-white p-4 rounded shadow-md mb-6">
            <h2 class="text-xl font-bold mb-4">Filter Laporan Penjualan</h2>
            <form method="GET" action="{{ route('petugas.generatelaporan.index') }}" class="flex items-center space-x-4">
                <label class="font-semibold">Dari:</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="border p-2 rounded">
                
                <label class="font-semibold">Sampai:</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="border p-2 rounded">
            
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow">
                    Filter
                </button>
            
                <a href="{{ route('petugas.generatelaporan.index') }}" class="bg-red-500 text-white px-4 py-2 rounded shadow">
                    Reset Filter
                </a>
                <button type="button" onclick="printLaporan()" class="bg-green-500 text-white px-4 py-2 rounded shadow">
                    Cetak Laporan
                </button>
            </form>            
        </div>

        <!-- Laporan Harian Transaksi -->
        <div class="bg-white bg-opacity-0 rounded shadow-md p-4 mt-8 backdrop-blur-lg">
            <h2 class="text-2xl font-bold mb-4">Laporan Harian Transaksi</h2>

            @if($penjualan->isEmpty())
                <p class="text-red-500 text-center">Tidak ada data transaksi dalam rentang tanggal yang dipilih.</p>
            @else
                <div id="laporan-container">
                    <table class="w-full">
                        <thead>
                            <tr class="grid grid-cols-7 gap-4 font-bold">
                                <th class="text-center">ID Penjualan</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">ID Pelanggan</th>
                                <th class="text-center">Total Harga</th>
                                <th class="text-center">Bayar</th>
                                <th class="text-center">Kembalian</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody class="space-y-4">
                            @foreach ($penjualan as $p)
                            <tr class="grid grid-cols-7 gap-4 bg-gray-50 p-4 rounded-lg">
                                <td class="text-center">{{ $p->id_penjualan }}</td>
                                <td class="text-center">{{ $p->tanggal_penjualan }}</td>
                                <td class="text-center">{{ $p->id_pelanggan }}</td>
                                <td class="text-center text-green-500">Rp{{ number_format($p->total_harga, 0, ',', '.') }}</td>
                                <td class="text-center">Rp{{ number_format($p->bayar, 0, ',', '.') }}</td>
                                <td class="text-center">Rp{{ number_format($p->kembalian, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('petugas.generatelaporan.show', $p->id_penjualan) }}">
                                        <button class="bg-blue-500 text-white px-3 py-1 rounded">Detail</button>
                                    </a>
                                </td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            @endif
        </div>
    </div>
    <script>
        // Fungsi untuk menampilkan modal detail transaksi
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
</x-petugas.app>
