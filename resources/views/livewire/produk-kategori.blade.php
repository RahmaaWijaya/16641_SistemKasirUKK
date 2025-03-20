<div>
    <!-- Kategori Filter -->
    <div class="flex justify-end space-x-4 mb-4">
        <button wire:click="testLivewire">Coba Livewire</button>
        @foreach ($kategoris as $kategori)
            <button wire:click="filterProduk('{{ $kategori->id_kategori }}')"
                class="bg-yellow-100 text-black border border-yellow-500 p-2 rounded-lg 
                       hover:bg-yellow-500 hover:text-white transition">
                {{ $kategori->nama_kategori }}
            </button>
        @endforeach
    </div>

    <!-- Daftar Produk -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @if (count($produks) > 0)
            @foreach ($produks as $produk)
                <div class="bg-white p-4 rounded-lg shadow-md relative">
                    <img alt="{{ $produk->nama_produk }}" class="rounded-lg mb-2" height="200" src="{{ asset('storage/' . $produk->foto_produk) }}" width="300"/>
                    <h3 class="text-lg font-semibold">
                        {{ $produk->nama_produk }}
                    </h3>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-semibold">
                            Rp{{ number_format($produk->harga_jual, 0, ',', '.') }}
                        </span>
                        <button class="bg-blue-500 text-white p-2 rounded-lg">
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
