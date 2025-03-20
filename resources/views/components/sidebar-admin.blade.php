<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <!DOCTYPE html>
    <html  lang="en" >
        <head>
            <meta charset="UTF-8" />
            <meta
                name="viewport"
                content="width=device-width, initial-scale=1.0"
            />
            <title>{{ $title ?? 'Default Title' }}</title>
            <link
              href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
              rel="stylesheet"
            />
            <link rel="stylesheet" href="{{asset('assets/css/tailwind.output.css')}}" />
            <script
              src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
              defer
            ></script>
            <script src="{{asset('assets/js/init-alpine.js')}}"></script>
            <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
            />
            <script
              src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
              defer
            ></script>
            <script src="{{asset('assets/js/charts-lines.js')}}" defer></script>
            <script src="{{asset('assets/js/charts-pie.js')}}" defer></script>
        </head>

        <body>
            <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
                <!-- Dekstop sidebar -->
                 <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
                    <div class="py-4 text-gray-500 dark:text-gray-400">
                        <a  class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">Jaya Kasir</a>
                        <ul class="mt-6">
                            <li class="relative px-6 py-3">
                                <span class="{{ Request::routeIs('admin.dashboard.index') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }}" aria-hidden="true"></span>
                                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 
                                {{ Request::routeIs('admin.dashboard.index') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-600 dark:text-gray-400' }} 
                                hover:text-gray-800 dark:hover:text-gray-200" href="{{route('admin.dashboard.index')}}">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" >
                                        <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    <span class="ml-4">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <ul>
                            <li class="relative px-6 py-3">
                                <span class="{{ Request::routeIs('admin.users.index') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }}" aria-hidden="true"></span>
                                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 
                                {{ Request::routeIs('admin.users.index') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-600 dark:text-gray-400' }} 
                                hover:text-gray-800 dark:hover:text-gray-200" href="{{route('admin.users.index')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                    </svg>
                                    <span class="ml-4">User</span>  
                                </a>
                            </li>
                            <li class="relative px-6 py-3">
                              <span class="{{ Request::routeIs('admin.kategori.index') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }}" aria-hidden="true"></span>
                              <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 
                              {{ Request::routeIs('admin.kategori.index') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-600 dark:text-gray-400' }} 
                              hover:text-gray-800 dark:hover:text-gray-200" href="{{route('admin.kategori.index')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                    </svg>
                                    <span class="ml-4">Kategori</span>      
                                </a>
                            </li>
                            <li class="relative px-6 py-3">
                              <span class="{{ Request::routeIs('admin.produk.index') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }}" aria-hidden="true"></span>
                              <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 
                              {{ Request::routeIs('admin.produk.index') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-600 dark:text-gray-400' }} 
                              hover:text-gray-800 dark:hover:text-gray-200" href="{{route('admin.produk.index')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span class="ml-4">Produk</span>   
                                </a>
                            </li>
                            <li class="relative px-6 py-3">
                              <span class="{{ Request::routeIs('admin.laporan.index') ? 'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg' : '' }}" aria-hidden="true"></span>
                              <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 
                              {{ Request::routeIs('admin.laporan.index') ? 'text-gray-800 dark:text-gray-100' : 'text-gray-600 dark:text-gray-400' }} 
                              hover:text-gray-800 dark:hover:text-gray-200" href="{{route('admin.laporan.index')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                    </svg>
                                    <span class="ml-4">Generate laporan `<span>                                      
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>
                <div class="flex flex-col flex-1 w-full">
                    @include('components.header-admin')
                    <main class="py-4 bg-white shadow-md dark:bg-gray-800">
                      {{ $slot }}
                    </main>
                </div>
            </div>
        </body>
    </html>
</div>
