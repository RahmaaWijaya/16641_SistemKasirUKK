<body>
    <x-sidebar-admin title="Tambah Data Kategori">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Tambah Data User
            </h2>

            <!-- General elements -->
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <form action="{{ route('admin.storekategori') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Nama Kategori</span>
                        <input name="nama_kategori" id="nama_kategori" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Snack" />
                    </label>
                    <div class="flex justify-end mt-6 space-x-4">
                        <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-gray-700 hover:bg-gray-800 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-700 hover:bg-purple-800 focus:outline-none focus:shadow-outline-purple">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-sidebar-admin>
</body>