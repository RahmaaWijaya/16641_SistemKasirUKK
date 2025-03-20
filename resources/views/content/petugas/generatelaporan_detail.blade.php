<x-petugas.app title="Menu Deial Laporan">
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
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Detail Transaksi #{{ $penjualan->id_penjualan }}</h2>
            </div>
            <div class="bg-white bg-opacity-0 rounded shadow-md p-4 mt-8 backdrop-blur-lg">
                    <table class="w-full">
                        <thead>
                            <tr class="grid grid-cols-7 gap-4 font-bold">
                                <th class="text-center">ID Produk</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga Satuan</th>
                                <th class="text-center">Potongan Harga</th>
                                <th class="text-center">Dskon</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="space-y-4">
                            @foreach ($detail_penjualan as $detail)
                            <tr class="grid grid-cols-7 gap-4 bg-gray-50 p-4 rounded-lg">
                                <td class="text-center">{{ $detail->id_produk }}</td>
                                <td class="text-center">{{ $detail->nama_produk }}</td>
                                <td class="text-center">{{ $detail->jumlah }}</td>
                                <td class="text-center">Rp{{ number_format($detail->harga_saat_transaksi, 0, ',', '.') }}</td>
                                <td class="text-center">Rp{{ number_format($detail->potongan_saat_transaksi, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $detail->diskon_saat_transaksi}}%</td>
                                <td class="text-center text-green-500">Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <a href="{{ url()->previous() }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded">
                Kembali
            </a>
        </div>
    </div>
</x-petugas.app>