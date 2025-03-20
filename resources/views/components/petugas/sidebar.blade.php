<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
 <!-- Sidebar -->
 <!-- Sidebar -->
<div x-data="{ expanded: false }" class="w-16 bg-white p-4 rounded-lg shadow-md transition-all duration-300" :class="expanded ? 'w-64' : 'w-16'">
  <ul>
    <!-- List Icon -->
    <li class="mb-2">
      <a class="flex items-center p-2 rounded-lg bg-gray-200 cursor-pointer hover:bg-yellow-100"
         :class="expanded ? 'bg-gray-300' : 'bg-gray-200'"
         @click="expanded = !expanded">
        <i class="fas fa-store"></i>
        <span x-show="expanded" class="ml-2 text-sm font-medium">Jaya Kasir</span>
      </a>
    </li>

    <!-- Transaksi -->
    <li class="mb-2">
      <a class="flex items-center p-2 rounded-lg transition-all duration-200 hover:bg-yellow-100 {{Request::is('petugas/dashboard*') ? 'bg-yellow-200' : 'bg-gray-200'}}"
         href="{{ route('petugas.dashboard.index') }}">
        <i class="fas fa-cart-plus"></i>
        <span x-show="expanded" class="ml-2 text-sm font-medium">Transaksi</span>
      </a>
    </li>

    <!-- Member -->
    <li class="mb-2">
      <a class="flex items-center p-2 rounded-lg transition-all duration-200 hover:bg-yellow-100 {{Request::is('petugas/member*') ? 'bg-yellow-200' : 'bg-gray-200'}}"
         href="{{ route('petugas.member.index') }}">
        <i class="fas fa-address-card"></i>
        <span x-show="expanded" class="ml-2 text-sm font-medium">Member</span>
      </a>
    </li>

    <!-- Generate Laporan -->
    <li class="mb-2">
      <a class="flex items-center p-2 rounded-lg transition-all duration-200 hover:bg-yellow-100 {{Request::routeIs('petugas.generatelaporan.index') ? 'bg-yellow-200' : 'bg-gray-200'}}"
         href="{{ route('petugas.generatelaporan.index') }}">
        <i class="fas fa-file-invoice"></i>
        <span x-show="expanded" class="ml-2 text-sm font-medium">Generate Laporan</span>
      </a>
    </li>

    <!-- Logout -->
    <li class="mb-2">
      <a class="flex items-center p-2 rounded-lg transition-all duration-200 hover:bg-yellow-100 bg-gray-200" 
         href="{{ route('logout') }}">
        <i class="fas fa-sign-out-alt"></i>
        <span x-show="expanded" class="ml-2 text-sm font-medium">Logout</span>
      </a>
    </li>
  </ul>
</div>

