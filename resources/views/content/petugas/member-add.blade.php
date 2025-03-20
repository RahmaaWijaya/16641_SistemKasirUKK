<x-petugas.app title="Add Member">
    <div class="flex-1 p-6 min-h-screen rounded bg-cover bg-opacity-70 bg-center backdrop-blur-lg" 
    style="background-image: url('https://i.pinimg.com/736x/c8/a1/8b/c8a18bc6cd711598ea5e274c8a7a6d64.jpg');">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700">
                Tambah Data Member
            </h2>
            
            <div class="bg-white p-6 rounded-lg shadow-md ">
            <!-- <div class="bg-[#F1F0E9] bg-opacity-0 rounded-lg shadow-md p-6 backdrop-blur-lg"> -->
                <form action="{{ route('petugas.member.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-6">
                        <h2 class="text-lg font-semibold mb-4">Personal Information</h2>
                        <div class="grid grid-cols-2 gap-4">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">Nama</label>
                        <input name="nama" class="border border-gray-300 rounded px-4 py-2 w-full mb-2" placeholder="First Name" type="text" required />
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">Email Address</label>
                        <input name="email" class="border border-gray-300 rounded px-4 py-2 w-full" type="email" placeholder="contoh@email.com" required />
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">Phone Number</label>
                        <input name="no_telp" class="border border-gray-300 rounded px-4 py-2 w-full" type="text" placeholder="08XXXXXXXXXX" required />
                    </div>
                    
                    <div class="mb-6">
                        <!-- <h2 class="text-lg font-semibold mb-4">Personal Address</h2> -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Address</label>
                                <input name="alamat" class="border border-gray-300 rounded px-4 py-2 w-full" type="text" placeholder="Alamat Lengkap" required />
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Point Belanja</label>
                                <input name="point" class="border border-gray-300 rounded px-4 py-2 w-full" type="text" placeholder="Kode Pos" required />
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end mt-6 space-x-4">
                        <a href="{{ route('petugas.member.index') }}">
                            <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-gray-600 border border-transparent rounded-lg hover:bg-gray-800 focus:outline-none focus:shadow-outline-gray">
                                Batal
                            </button>
                        </a>
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-yellow-600 border border-transparent rounded-lg hover:bg-yellow-800 focus:outline-none focus:shadow-outline-yellow">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-petugas.app>