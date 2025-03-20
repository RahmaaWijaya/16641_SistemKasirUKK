
<body>
    <x-sidebar-admin title="Edit Data User">
      <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Edit Data User</h2>
        <form action="{{route('admin.updateproduk', $produk->id_produk)}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda yakin ingin mengedit data produk?');">
          @csrf
          @method('PUT')
          <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Nama</span>
              <input name="nama_produk" id="nama_produk" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $produk->nama_produk }}" required />
          </label>
      
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Kategori</span>
              <select name="id_kategori" id="id_kategori" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                @foreach ($kategori as $k)
                <option value="{{$k->id_kategori}}"  {{ $k->id_kategori == old('id_kategori', $selectedKategori) ? 'selected' : '' }} >{{$k->nama_kategori}}</option>
                @endforeach
            </select>
            @error('id_kategori')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </label>
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Foto Produk</span>
            <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                <input name="foto_produk" id="foto_produk" type="file" class=" form-control @error('foto_produk') is-invalid @enderror block w-full pl-36 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input z-10" />
                <button type="button" class="absolute inset-y-0 left-0 w-32 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-l-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray z-0">
                    Pilih file
                  </button>
              </div>
              @error('foto_produk')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
            @if ($produk->foto_produk)
                <img src="{{ asset('storage/' . $produk->foto_produk)}}" alt="Produk" width="100" class="mt-2">
            @endif
        </label>
      
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Harga Beli</span>
              <input name="harga_beli" id="harga_beli" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $produk->harga_beli }}" />
          </label>
      
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Harga Jual</span>
              <input name="harga_jual" id="harga_jual" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $produk->harga_jual }}"></input>
          </label>
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Diskon</span>
              <input name="diskon" id="diskon"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $produk->diskon }}"></input>
          </label>
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Potongan Harga</span>
              <input name="potongan_harga" id="potongan_harga"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $produk->potongan_harga }}"></input>
          </label>
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Stok</span>
              <input name="stok" id="stok"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $produk->stok }}"></input>
          </label>
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Barcode</span>
              <input name="barcode" id="barcode"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $produk->barcode }}"></input>
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
          
        </form>
      
    </div>
    </x-sidebar-admin>
</body>
</html>