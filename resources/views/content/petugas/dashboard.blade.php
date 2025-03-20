<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <title>
            Jaya Kasir
        </title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
        <style>
             /* Prevent scroll bars */
        body {
            overflow: hidden; /* Prevents scroll bars */
        }
        </style>
    </head>
<body>
    <html lang="en">
        <body class="bg-gray-100">
        <div class="flex h-screen overflow-hidden">
            <x-petugas.sidebar-petugas></x-petugas.sidebar-petugas>
            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <header class="flex items-center justify-between bg-white shadow px-6 py-4">
                    <h1 class="text-2xl font-semibold text-violet-500">
                        Diskon Hari ini
                    </h1>
                </header>
                <main class="flex-1 overflow-y-auto p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Product Item -->
                        <div class="bg-white shadow rounded-lg p-4 flex items-center">
                            <img alt="Apple" class="h-20 w-20 rounded-full mr-4" height="100"
                                 src="https://storage.googleapis.com/a1aa/image/diI9oHmf3aW1JiOWoflbK2NfQJ4lYlFFeOQiK5CCSyg7ErLQB.jpg"
                                 width="100"/>
                            <div>
                                <h2 class="text-lg font-semibold text-violet-500">
                                    Apple
                                </h2>
                                <p class="text-gray-600 line-through">
                                    10.000
                                </p>
                                <p class="text-red-600">
                                    8.000
                                </p>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-600">
                                        Discount: 20%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Repeat similar blocks for other products -->
                        <div class="bg-white shadow rounded-lg p-4 flex items-center">
                            <img alt="Banana" class="h-20 w-20 rounded-full mr-4" height="100"
                                 src="https://storage.googleapis.com/a1aa/image/RcHCFUgRrM4vGRoz4xgLrtvdiLMYtqUkoinVmeKyziKmYdBKA.jpg"
                                 width="100"/>
                            <div>
                                <h2 class="text-lg font-semibold text-violet-500">
                                    Banana
                                </h2>
                                <p class="text-gray-600 line-through">
                                    15.000
                                </p>
                                <p class="text-red-600">
                                    12.000
                                </p>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-600">
                                        Discount: 20%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 flex items-center">
                            <img alt="Orange" class="h-20 w-20 rounded-full mr-4" height="100"
                                 src="https://storage.googleapis.com/a1aa/image/eNPxySGuLDRSKCpIOVIAAgo3iTzzrG3GuMpSVbfugqTIx6CUA.jpg"
                                 width="100"/>
                            <div>
                                <h2 class="text-lg font-semibold text-violet-500">
                                    Orange
                                </h2>
                                <p class="text-gray-600 line-through">
                                    20.000
                                </p>
                                <p class="text-red-600">
                                    16.000
                                </p>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-600">
                                        Discount: 20%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 flex items-center">
                            <img alt="Milk" class="h-20 w-20 rounded-full mr-4" height="100"
                                 src="https://storage.googleapis.com/a1aa/image/wfVyes33qriwWkwZS8ecKBhcpx3Cb4O5NStWhhPzo9sSi1FoA.jpg"
                                 width="100"/>
                            <div>
                                <h2 class="text-lg font-semibold text-violet-500">
                                    Milk
                                </h2>
                                <p class="text-gray-600 line-through">
                                    25.000
                                </p>
                                <p class="text-red-600">
                                    20.000
                                </p>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-600">
                                        Discount: 20%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 flex items-center">
                            <img alt="Bread" class="h-20 w-20 rounded-full mr-4" height="100"
                                 src="https://storage.googleapis.com/a1aa/image/NKWlrp7kfCXf9UxxaAGfefCt4u3G0eWbqUrvUUYwO7mJUsuAF.jpg"
                                 width="100"/>
                            <div>
                                <h2 class="text-lg font-semibold text-violet-500">
                                    Bread
                                </h2>
                                <p class="text-gray-600 line-through">
                                    30.000
                                </p>
                                <p class="text-red-600">
                                    24.000
                                </p>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-600">
                                        Discount: 20%
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white shadow rounded-lg p-4 flex items-center">
                            <img alt="Eggs" class="h-20 w-20 rounded-full mr-4" height="100"
                                 src="https://storage.googleapis.com/a1aa/image/oYWkaYRxrH7jOd6h0rfIIyVer7E4mLeA4PBMuXXjHGfuErLQB.jpg"
                                 width="100"/>
                            <div>
                                <h2 class="text-lg font-semibold text-violet-500">
                                    Eggs
                                </h2>
                                <p class="text-gray-600 line-through">
                                    35.000
                                </p>
                                <p class="text-red-600">
                                    28.000
                                </p>
                                <div class="flex items-center mt-2">
                                    <span class="text-green-600">
                                        Discount: 20%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- Order Summary -->
            <div class="w-full md:w-80 bg-black text-white flex flex-col">
                <div class="flex items-center justify-between bg-gray-900 px-6 py-4">
                    <h2 class="text-lg font-semibold text-violet-500">
                        Current Order
                    </h2>
                    <span class="text-sm">
                        2023-05-27
                    </span>
                </div>
                <div class="flex-1 overflow-y-auto p-6">
                    <div class="bg-gray-700 p-4 rounded-lg mb-4">
                        <h3 class="text-lg font-semibold text-violet-500">
                            Sweet Chili Tofu
                        </h3>
                        <p class="text-gray-400">
                            105.000
                        </p>
                        <div class="flex items-center mt-2">
                            <button class="text-gray-400 hover:text-white">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span class="mx-2">
                                2
                            </span>
                            <button class="text-gray-400 hover:text-white">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="bg-gray-700 p-4 rounded-lg mb-4">
                        <h3 class="text-lg font-semibold text-violet-500">
                            Pappardelle
                        </h3>
                        <p class="text-gray-400">
                            70.000
                        </p>
                    </div>
                </div>
                <div class="px-6 py-4 border-t border-gray-700">
                    <div class="flex justify-between mb-2">
                        <span>
                            Subtotal
                        </span>
                        <span>
                            Rp 280.000
                        </span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>
                            Member Discount
                        </span>
                        <span>
                            5%
                        </span>
                    </div>
                    <div class="flex justify-between font-semibold mb-4">
                        <span>
                            Total
                        </span>
                        <span>
                            Rp 308.000
                        </span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span>
                            Points Earned
                        </span>
                        <span>
                            30
                        </span>
                    </div>
                    <button class="w-full py-2 bg-violet-500 text-white rounded-lg">
                        Place Order
                    </button>
                </div>
            </div>
        </div>
        </body>
        </html>
</body>
</html>