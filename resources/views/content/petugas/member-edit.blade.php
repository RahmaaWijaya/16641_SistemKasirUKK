<x-petugas.app title="Update Data Member">
    <div class="flex-1 p-6 min-h-screen rounded bg-cover bg-opacity-70 bg-center backdrop-blur-lg" 
    style="background-image: url('https://i.pinimg.com/736x/c8/a1/8b/c8a18bc6cd711598ea5e274c8a7a6d64.jpg');">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">Edit Data Member</h2>
            
            <form action="{{ route('petugas.member.update',$pelanggan->id_pelanggan) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirmUpdate()">
                @csrf
                @method('PUT')
                <div class="bg-white p-6 rounded-lg shadow-md ">
                    <label class="block text-sm">
                        <span class="text-gray-700">Barcode</span>
                        <input name="barcode" id="barcode" class="border border-gray-300 rounded px-4 py-2 w-full mb-2" value="{{ $pelanggan->barcode }}" readonly />
                    </label>
        
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700">Nama</span>
                        <input name="nama" id="nama" class="border border-gray-300 rounded px-4 py-2 w-full mb-2" value="{{ $pelanggan->nama }}" required />
                    </label>
        
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700">Alamat</span>
                        <textarea name="alamat" id="alamat" class="border border-gray-300 rounded px-4 py-2 w-full mb-2" required>{{ $pelanggan->alamat }}</textarea>
                    </label>
        
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700">No. Telepon</span>
                        <input name="no_telp" id="no_telp" class="border border-gray-300 rounded px-4 py-2 w-full mb-2" value="{{ $pelanggan->no_telp }}" required />
                    </label>
        
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700">Email</span>
                        <input name="email" id="email" type="email" class="border border-gray-300 rounded px-4 py-2 w-full mb-2" value="{{ $pelanggan->email }}" required />
                    </label>
        
                    <label class="block text-sm mt-4">
                        <span class="text-gray-700">Point</span>
                        <input name="point" id="point" type="number" class="border border-gray-300 rounded px-4 py-2 w-full mb-2" value="{{ $pelanggan->point }}" required />
                    </label>
        
                    <div class="flex justify-end mt-6 space-x-4">
                        <a href="{{ route('petugas.member.index') }}">
                            <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-700 hover:bg-gray-800 focus:outline-none focus:shadow-outline-gray">
                                Batal
                            </button>
                        </a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-600 border border-transparent rounded-lg active:bg-yellow-700 hover:bg-yellow-800 focus:outline-none focus:shadow-outline-yellow">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function confirmUpdate() {
            return confirm('Apakah Anda yakin ingin mengedit data member?');
        }
    </script>
    
</x-petugas.app>