<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <head>

        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
         {{$title ?? 'Petugas Sidebar'}}
        </title>
        <script src="https://cdn.tailwindcss.com">
        </script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
        @livewireStyles
        <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
        <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>
    </head>
    <body class="bg-gray-100">
        <div class="flex flex-col lg:flex-row p-4">
            @include('components.petugas.sidebar')
            {{$slot ?? ''}}
            @livewireScripts
        </div>
    </body>
</div>