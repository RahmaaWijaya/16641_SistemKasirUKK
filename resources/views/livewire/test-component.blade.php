<div>
    <!-- Kategori Filter -->
     <div x-data>
         <script>
             Livewire.on('produkDiperbarui', () => {
                 console.log('Livewire menerima event produkDiperbarui');
             });
         </script>
     </div>

    <!-- Daftar Produk -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @if (count($produks) > 0)
            @foreach ($produks as $produk)
                <div class="bg-white p-4 rounded-lg shadow-md relative">
                    <!-- Label Kategori -->
                    <span class="absolute top-2 left-2 bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded">
                        {{ $produk->kategori->nama_kategori ?? 'Uncategorized' }}
                    </span>
                    <img alt="{{ $produk->nama_produk }}" class="rounded-lg mb-2" height="200" src="{{ asset('storage/' . $produk->foto_produk) }}" width="300"/>
                    <h3 class="text-lg font-semibold">
                        {{ $produk->nama_produk }}
                    </h3>
                    <div class="flex justify-between items-center">
                        <div>
                            @php
                            $harga_awal = $produk->harga_jual;
                            $harga_setelah_diskon = $produk->harga_jual - ($produk->harga_jual * ($produk->diskon ?? 0) / 100);
                            $harga_setelah_potongan = $produk->harga_jual - ($produk->potongan_harga ?? 0);
                        @endphp

                        <!-- Jika ada diskon atau potongan, tampilkan harga coret -->
                        @if ($produk->diskon > 0 || $produk->potongan_harga > 0)
                            <span class="text-sm text-red-500 line-through">
                                Rp{{ number_format($harga_awal, 0, ',', '.') }}
                            </span>
                        @endif

                        <!-- Harga Akhir (Harga setelah diskon atau potongan jika ada) -->
                        <span class="text-lg font-semibold text-gray-900">
                            @if ($produk->diskon > 0)
                                Rp{{ number_format($harga_setelah_diskon, 0, ',', '.') }}
                            @elseif ($produk->potongan_harga > 0)
                                Rp{{ number_format($harga_setelah_potongan, 0, ',', '.') }}
                            @else
                                Rp{{ number_format($harga_awal, 0, ',', '.') }}
                            @endif
                        </span>

                        <!-- Keterangan Diskon/Potongan -->
                        @if ($produk->diskon > 0)
                            <span class="text-xs bg-green-500 text-white px-2 py-1 rounded ml-2">
                                Diskon {{ $produk->diskon }}%
                            </span>
                        @elseif ($produk->potongan_harga > 0)
                            <span class="text-xs bg-blue-500 text-white px-2 py-1 rounded ml-2">
                                Potongan Rp{{ number_format($produk->potongan_harga, 0, ',', '.') }}
                            </span>
                        @endif
                        </div>
                        <button class="bg-blue-500 text-white p-2 rounded-lg"
                            x-data
                            @click="$dispatch('addProductToOrder', { id: '{{ $produk->id_produk }}' })">
                            +
                        </button>

                    </div>
                </div>
            @endforeach
        @else
            <p class="text-gray-500 text-center mt-4">Tidak ada produk dalam kategori ini.</p>
        @endif
    </div>
</div>
