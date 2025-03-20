<body>
    <x-sidebar-admin title="Tambah Data User">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Tambah Data Produk
            </h2>

            <!-- General elements -->
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('admin.storeproduk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama</span>
                        <input name="nama_produk" id="nama_produk" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Chitato" />
                        @error('nama_produk')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Kategori</span>
                        <select name="id_kategori" id="id_kategori" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            @foreach ($kategori as $k)
                            <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Foto Produk</span>
                        <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                            <input name="foto_produk" id="foto_produk" type="file" class="block w-full pl-36 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input z-10" />
                            <button type="button" class="absolute inset-y-0 left-0 w-32 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-l-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray z-0">
                                Pilih file
                            </button>
                            @error('foto_produk')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror

                        </div>
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Harga Beli</span>
                        <input name="harga_beli" id="harga_beli" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Rp." />
                        @error('harga_beli')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Harga Jual</span>
                        <input name="harga_jual" id="harga_jual" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Rp. "></input>
                        @error('harga_jual')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Diskon</span>
                        <input name="diskon" id="diskon" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="xx%" />
                        @error('diskon')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Potongan Harga</span>
                        <input name="potongan_harga" id="potongan_harga" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="xx%" />
                        @error('potongan_harga')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Stok</span>
                        <input name="stok" id="stok" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="0" />
                        @error('stok')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Barcode</span>
                        <input name="barcode" id="barcode" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Scan barcode..." />
                        @error('barcode')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </label>
                    <div class="flex justify-end mt-6 space-x-4">
                        <a href="{{route('admin.produk.index')}}">
                            <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-gray-700 hover:bg-gray-800 focus:outline-none focus:shadow-outline-gray">
                                Cancel
                            </button>
                        </a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-700 hover:bg-purple-800 focus:outline-none focus:shadow-outline-purple">
                            Simpan Perubahan
                        </button>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            let barcodeInput = document.getElementById("barcode");
                    
                            barcodeInput.addEventListener("keypress", function (event) {
                                if (event.key === "Enter") {
                                    event.preventDefault(); // Mencegah form dikirim jika Enter ditekan
                                    console.log("Barcode scanned:", barcodeInput.value);
                                    // Tambahkan logika tambahan jika perlu, misalnya validasi atau auto-submit
                                }
                            });
                        });
                    </script>
                </form>
            </div>
        </div>
    </x-sidebar-admin>
</body>
