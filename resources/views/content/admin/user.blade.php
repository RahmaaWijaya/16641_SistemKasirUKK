

<body>
    <x-sidebar-admin title="Data User Admin">
        <div class="container px-6 mx-auto grid">
            <!-- ini notifikasi berlasil edit data -->
            @if (session('success'))
            <div id="success-notification" 
                class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" 
                role="alert">
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
                            setTimeout(() => notification.remove(), 500); // Remove element after fading out
                        }, 3000); // Delay before starting fade-out (3 seconds)
                    }
                });
            </script>
                        
            <div class="flex items-center justify-between my-6">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">Data Users</h2>
                <a href="{{route('admin.usersadd.index')}}">

                    <button
                      class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    >
                      Add User
                    </button>
                </a>
            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800" >
                        <th class="px-4 py-3">id</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Username</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Alamat</th>
                        <th class="px-4 py-3">Telepon</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                        @foreach($users as $user)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">{{ $user->id }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block" >
                                        <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/' . $user->profile_picture)}}" alt="">
                                    </div>
                                    <p class="font-semibold">{{ $user->name }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $user->usernama }}</td>
                            <td class="px-4 py-3 text-sm">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-xs">
                                <span  class="px-2 py-1 font-semibold leading-tight rounded-full 
                                {{ $user->user_priv === 'admin' ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100' : '' }}
                                {{ $user->user_priv === 'petugas' ? 'text-orange-700 bg-orange-100 dark:bg-orange-700 dark:text-orange-100' : '' }}"> {{ $user->user_priv }} </span>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $user->alamat }}</td>
                            <td class="px-4 py-3 text-sm">{{ $user->hp }}</td>
                            <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{route('admin.usersedit.index', $user->id)}}">

                                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit"  >
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" >
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" ></path>
                                    </svg>
                                    </button>
                                </a>
                                <form action="{{route('admin.usersdelete', $user->id)}}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                    @csrf
                                    <button  class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" >
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" >
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" ></path>
                                    </svg>
                                    </button>
                                </form>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    {{ $users->links() }}
                    <span>
                        Showing {{ $users->firstItem() }}-{{ $users->lastItem() }} of {{ $users->total() }}
                    </span>
                    
                </div>
            </div>
        </div>
    </x-sidebar-admin>
<!-- <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center" >
Modal
    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0  transform translate-y-1/2"  @click.away="closeModal" @keydown.escape="closeModal" class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal" >
    Remove header if you don't want a close icon. Use modal body to place modal tile.
    <header class="flex justify-end">
        <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="closeModal" >
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true" >
            <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd" ></path>
        </svg>
        </button>
    </header>
    Modal body
    <div class="mt-4 mb-6">
        Modal title
        <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300"> Modal header </p>
        Modal description
        <p class="text-sm text-gray-700 dark:text-gray-400"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum et
        eligendi repudiandae voluptatem tempore! </p>
    </div>
    <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
        <button @click="closeModal" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"> Cancel </button>
        <button class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> Accept </button>
    </footer>
    </div>
</div> -->

</body>
</html>