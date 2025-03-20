<x-petugas.app title="Menu Member">
   <!-- Main Content -->
   <div class="flex-1 p-6 min-h-screen rounded bg-cover bg-opacity-70 bg-center backdrop-blur-lg" 
   style="background-image: url('https://i.pinimg.com/736x/c8/a1/8b/c8a18bc6cd711598ea5e274c8a7a6d64.jpg');">
       <!-- Header -->
       <div class="flex justify-between items-center mb-6 bg-[#F1F0E9] bg-opacity-0 p-4 rounded shadow-md backdrop-blur-lg">
           <div class="flex items-center bg-white p-2 rounded shadow-sm w-1/2">
               <input class="flex-1 p-2 outline-none" placeholder="Search" type="text" />
               <i class="fas fa-search text-gray-600"></i>
           </div>
           <div class="flex items-center space-x-4">
               <div class="flex items-center space-x-2">
                  <span class="text-gray-600">{{ Auth()->user()->usernama }}</span>
                  <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('storage/public/profiles/default.png') }}" alt="Profile petugas kasir" class="w-10 h-10 rounded-full" />
               </div>
           </div>
       </div>
       @if(session('success'))
            <div id="success-alert" class="mb-4 p-4 bg-green-500 text-white rounded shadow-md">
                {{ session('success') }}
            </div>
        @endif
        <script>
            setTimeout(() => {
                document.getElementById('success-alert')?.remove();
            }, 3000);
        </script>        
       <!-- Search and Filters -->
       <div class="flex justify-between items-center mb-6">
           <h2 class="text-2xl font-bold">Data Member</h2>
           <div class="flex space-x-4">
               <!-- <button class="bg-gray-200 p-2 rounded shadow-sm flex items-center">
                   <i class="fas fa-filter mr-2"></i> FILTERS
               </button> -->
               <a href="{{route('petugas.member.add')}}">
                  <button class="bg-blue-500 text-white p-2 rounded shadow-sm flex items-center">
                      <i class="fas fa-plus mr-2"></i> Add Member
                  </button>
               </a>
           </div>
       </div>

       <!-- Client Table -->
       <div class="bg-[#F1F0E9] bg-opacity-0 rounded shadow-md p-4 mt-4 backdrop-blur-lg">
         <table class="w-full">
             <thead>
                 <tr class="grid grid-cols-8 gap-4 font-bold">
                     <th class="text-center">ID Pelanggan</th>
                     <th class="text-center">Nama</th>
                     <th class="text-center">No Telp</th>
                     <th class="text-center">Email</th>
                     <th class="text-center">Point</th>
                     <th class="text-center">Barcode</th>
                     <th class="text-center">Alamat</th>
                     <th class="text-center">Actions</th>
                 </tr>
             </thead>
             <tbody class="space-y-4">
                 @foreach ($pelanggan as $p)
                 <tr class="grid grid-cols-8 gap-4 bg-gray-50 p-4 rounded-lg">
                     <td class="text-center">{{ $p->id_pelanggan }}</td>
                     <td class="text-center">{{ $p->nama }}</td>
                     <td class="text-center">{{ $p->no_telp }}</td>
                     <td class="text-center">{{ $p->email }}</td>
                     <td class="text-center text-green-500">{{ $p->point }}</td>
                     <td class="text-center">{{ $p->barcode }}</td>
                     <td class="text-center">{{ $p->alamat }}</td>
                     <td class="flex justify-center space-x-2">
                         <a href="{{ route('petugas.member.edit', $p->id_pelanggan) }}">
                            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit" >
                                <i class="fas fa-edit text-blue-500 text-xl"></i>
                            </button>
                         </a>
                         <form action="{{route('petugas.member.delete', $p->id_pelanggan)}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?');">
                             @csrf
                             <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                 <i class="fas fa-trash text-red-500 text-xl"></i>
                             </button>
                         </form>
                     </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
   </div>
</x-petugas.app>
