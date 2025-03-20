
<body>
    <x-sidebar-admin title="Edit Data User">
      <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Edit Data User</h2>
        <form action="{{route('admin.usersupdate.index', $user->id)}}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda yakin ingin mengedit data user?');">
          @csrf
          @method('PUT')
          <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Nama</span>
              <input name="name" id="name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $user->name }}" required />
          </label>
      
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Username</span>
              <input name="usernama" id="usernama" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $user->usernama }}" required />
          </label>
      
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Email</span>
              <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input name="email" id="email" type="email" class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" value="{{ $user->email }}" required />
                  <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                      </svg>
                  </div>
              </div>
          </label>
      
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Profile</span>
              <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                  <input name="profile_file" id="profile_file" type="file" class=" form-control @error('profile_file') is-invalid @enderror block w-full pl-36 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input z-10" />
                  <button type="button" class="absolute inset-y-0 left-0 w-32 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-l-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray z-0">
                      Pilih file
                    </button>
                </div>
                @error('profile_file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              @if ($user->profile_picture)
                  <img src="{{ asset('storage/' . $user->profile_picture)}}" alt="Profile" width="100" class="mt-2">
              @endif
          </label>
      
          <!-- <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Password</span>
              <input name="password" id="password" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Kosongkan jika tidak diubah" />
          </label> -->
      
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Telepon</span>
              <input name="hp" id="hp" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="{{ $user->hp }}" />
          </label>
      
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Alamat</span>
              <textarea name="alamat" id="alamat" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3">{{ $user->alamat }}</textarea>
          </label>
      
          <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Role</span>
              <select name="user_priv" id="user_priv" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                  <option value="Admin" {{ $user->user_priv === 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="Petugas" {{ $user->user_priv === 'petugas' ? 'selected' : '' }}>Petugas</option>
              </select>
          </label>
      
          <div class="flex justify-end mt-6 space-x-4">
            
              <a href="{{ route('admin.users.index') }}">
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