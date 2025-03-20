 <!-- Sidebar -->
 <div class="w-64 bg-black text-white flex flex-col">
    <div class="flex items-center justify-center h-16 border-b border-gray-700">
        <!-- <img alt="Jaya Kasir logo" class="h-10 w-10 mr-2" height="40"
             src="https://via.placeholder.com/40" width="40"/> -->
        <span class="text-xl font-bold text-violet-500">
            Jaya Kasir
        </span>
    </div>
    <div class="flex-1 px-4 py-2">
        <h2 class="text-lg font-semibold mb-4 text-violet-500">
            Scanner Barcode
        </h2>
        <input class="w-full px-4 py-2 rounded-lg bg-gray-700 text-white placeholder-gray-400"
               placeholder="Scan barcode here" type="text"/>
        <h2 class="text-lg font-semibold mb-4 mt-4 text-violet-500">
            Member ID
        </h2>
        <input class="w-full px-4 py-2 rounded-lg bg-gray-700 text-white placeholder-gray-400"
        placeholder="Enter member ID" type="text"/>
        <!-- <nav class="flex-1 px-4 py-2"> -->
            <ul>
                <li class="mt-4 mb-2">
                    <a class="flex items-center px-4 py-2 text-gray-400 hover:bg-violet-500 hover:text-white rounded-lg"
                       href="#">
                        <!-- <i class="fas fa-home mr-3"></i> -->
                        <i class="fas fa-id-card mr-3"></i>
                        Member
                    </a>
                </li>
                <li class="mt-2">
                    <a class="flex items-center px-4 py-2 text-gray-400 hover:bg-violet-500 hover:text-white rounded-lg"
                       href="#">
                        <i class="fas fa-file-alt mr-3"></i>
                        Laporan Harian
                    </a>
                </li>
                <!-- <li class="mb-2">
                    <a class="flex items-center px-4 py-2 bg-gray-700 text-white rounded" href="#">
                        <i class="fas fa-plus mr-3"></i>
                        Make Order
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- <button class="w-full py-2 mt-4 bg-violet-500 text-white rounded-lg">
            Laporan Harian
        </button> -->
        
        <a href="{{route('logout')}}">
            <button href="{{route('logout')}}" class="w-full py-2 mt-4 bg-violet-500 text-white rounded-lg">
                Logout
            </button>
        </a>
    </div>
    <div class="px-4 py-2 border-t border-gray-700">
        <a class="flex items-center text-gray-400 hover:text-white" href="#">
            <!-- <i class="fas fa-user-circle mr-2"></i> -->
            <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_picture ?? asset('images/placeholder.png') }}" alt="{{ Auth::user()->usernama}}" aria-hidden="true" />
            {{ Auth()->user()->usernama }}
        </a>
    </div>
    <!-- <a href="{{route('logout')}}" class="btn btn-sm btn-outline-secondary mt-2">Logout</a> -->
</div>