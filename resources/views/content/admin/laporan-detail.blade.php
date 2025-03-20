<x-sidebar-admin title="Detail Laporan Admin">
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
            <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Detail Penjualan #{{ $penjualan->id_penjualan }}</h2>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div id="laporan-container" class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID Produk</th>
                            <th class="px-4 py-3">Nama Produk</th>
                            <th class="px-4 py-3">Jumlah</th>
                            <th class="px-4 py-3">Harga Satuan</th>
                            <th class="px-4 py-3">Potongan Harga</th>
                            <th class="px-4 py-3">Diskon</th>
                            <th class="px-4 py-3">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($detail_penjualan as $detail)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">{{ $detail->id_produk }}</td>
                            <td class="px-4 py-3 text-sm">{{ $detail->nama_produk }}</td>
                            <td class="px-4 py-3 text-sm">{{ $detail->jumlah }}</td>
                            <td class="px-4 py-3 text-sm">Rp{{ number_format($detail->harga_saat_transaksi, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm">Rp{{ number_format($detail->potongan_saat_transaksi, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm">{{ $detail->diskon_saat_transaksi }}%</td>
                            <td class="px-4 py-3 text-sm">Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex items-center justify-between my-6">
            <a href="{{ url()->previous() }}" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Kembali
            </a>
        </div>
    </div>
</x-sidebar-admin>