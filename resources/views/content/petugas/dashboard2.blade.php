<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Supermarket
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer>
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100">
  <div class="flex" x-data="{ sidebarOpen: false, quantities: { apple: 2, carrot: 5, milk: 1 }, dateTime: new Date().toLocaleString() }">
   <!-- Sidebar -->
   <div class="w-16 bg-white h-screen shadow-md flex flex-col justify-between">
    <div>
     <div class="p-4">
      <img alt="Logo" class="w-10 h-10 mx-auto" height="40" src="https://storage.googleapis.com/a1aa/image/p618ACqsfkwex0jlgj2TM5egj5KVCFV2wnbhk5fbWUfgdTEhC.jpg" width="40"/>
     </div>
     <div class="mt-4">
      <ul class="space-y-4">
       <li>
        <i class="fas fa-home text-gray-500 text-xl">
        </i>
       </li>
       <li>
        <i class="fas fa-search text-gray-500 text-xl">
        </i>
       </li>
       <li>
        <i class="fas fa-bell text-gray-500 text-xl">
        </i>
       </li>
       <li>
        <i class="fas fa-cog text-gray-500 text-xl">
        </i>
       </li>
      </ul>
     </div>
    </div>
    <div class="p-4">
     <div class="flex items-center space-x-2">
      <img alt="User Avatar" class="w-10 h-10 rounded-full" height="40" src="https://storage.googleapis.com/a1aa/image/itAw39T0I77xGhqVr87X9BPyZDQSTJgfehHhQMyPIZqzbiIUA.jpg" width="40"/>
      <div x-show="sidebarOpen">
       <p class="text-sm font-semibold">
        Courtney Henry
       </p>
       <p class="text-xs text-gray-500">
        Cashier ID: 1234
       </p>
      </div>
     </div>
    </div>
   </div>
   <!-- Main Content -->
   <div class="flex-1 p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
     <div class="flex items-center space-x-4">
      <input class="px-4 py-2 border rounded-md w-80" placeholder="Search Your Product Here" type="text"/>
     </div>
     <div class="flex items-center space-x-4">
      <i class="fas fa-th text-gray-500 text-xl" @click="sidebarOpen = !sidebarOpen">
      </i>
      <div>
       <p class="text-sm text-gray-500" x-text="dateTime">
       </p>
      </div>
     </div>
    </div>
    <!-- Product Categories -->
    <div class="grid grid-cols-4 gap-4 mb-6">
     <div class="p-4 bg-white rounded-md shadow-md text-center">
      <p class="font-semibold">
       Fruits
      </p>
      <p class="text-sm text-gray-500">
       12 Items In Stock
      </p>
     </div>
     <div class="p-4 bg-blue-100 rounded-md shadow-md text-center">
      <p class="font-semibold text-blue-600">
       Vegetables
      </p>
      <p class="text-sm text-blue-600">
       12 Items In Stock
      </p>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md text-center">
      <p class="font-semibold">
       Dairy
      </p>
      <p class="text-sm text-gray-500">
       12 Items In Stock
      </p>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md text-center">
      <p class="font-semibold">
       Meat
      </p>
      <p class="text-sm text-gray-500">
       12 Items In Stock
      </p>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md text-center">
      <p class="font-semibold">
       Snacks
      </p>
      <p class="text-sm text-gray-500">
       12 Items In Stock
      </p>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md text-center">
      <p class="font-semibold">
       Beverages
      </p>
      <p class="text-sm text-gray-500">
       12 Items In Stock
      </p>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md text-center">
      <p class="font-semibold">
       Bakery
      </p>
      <p class="text-sm text-gray-500">
       12 Items In Stock
      </p>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md text-center">
      <p class="font-semibold">
       Frozen
      </p>
      <p class="text-sm text-gray-500">
       12 Items In Stock
      </p>
     </div>
    </div>
    <!-- Product List -->
    <div class="grid grid-cols-3 gap-4">
     <!-- Product Item -->
     <div class="p-4 bg-white rounded-md shadow-md">
      <img alt="Apple" class="w-full h-24 object-cover rounded-md mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/oyKJTK5lAfVBaaxEv3EQlq6OmbbgfDZqezKaDOtjffFmBUEhC.jpg" width="100"/>
      <p class="font-semibold">
       Apple
      </p>
      <p class="text-sm text-gray-500">
       Fresh and juicy apples.
      </p>
      <div class="flex justify-between items-center mt-2">
       <p class="font-semibold">
        $3.5
       </p>
       <button class="bg-blue-500 text-white p-2 rounded-full">
        <i class="fas fa-plus">
        </i>
       </button>
      </div>
     </div>
     <!-- Repeat similar blocks for other products -->
     <div class="p-4 bg-white rounded-md shadow-md">
      <img alt="Carrot" class="w-full h-24 object-cover rounded-md mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/rblH0b7qBSYeKSphhNKbyoggm0UkwJZHR3OkzM2EGVCHQREKA.jpg" width="100"/>
      <p class="font-semibold">
       Carrot
      </p>
      <p class="text-sm text-gray-500">
       Fresh and crunchy carrots.
      </p>
      <div class="flex justify-between items-center mt-2">
       <p class="font-semibold">
        $2.0
       </p>
       <button class="bg-blue-500 text-white p-2 rounded-full">
        <i class="fas fa-plus">
        </i>
       </button>
      </div>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md">
      <img alt="Milk" class="w-full h-24 object-cover rounded-md mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/TmJ9RxYYec2YFSl4nBZURW9COiR8gf5eyKjixI1gelK1AKiQB.jpg" width="100"/>
      <p class="font-semibold">
       Milk
      </p>
      <p class="text-sm text-gray-500">
       Fresh dairy milk.
      </p>
      <div class="flex justify-between items-center mt-2">
       <p class="font-semibold">
        $1.5
       </p>
       <button class="bg-blue-500 text-white p-2 rounded-full">
        <i class="fas fa-plus">
        </i>
       </button>
      </div>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md">
      <img alt="Chicken Breast" class="w-full h-24 object-cover rounded-md mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/69fgPhNWvsSgQS4iQ1XLDbVKe0owomIQT9vWznCOJVyLgiIUA.jpg" width="100"/>
      <p class="font-semibold">
       Chicken Breast
      </p>
      <p class="text-sm text-gray-500">
       Fresh and tender chicken breast.
      </p>
      <div class="flex justify-between items-center mt-2">
       <p class="font-semibold">
        $5.0
       </p>
       <button class="bg-blue-500 text-white p-2 rounded-full">
        <i class="fas fa-plus">
        </i>
       </button>
      </div>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md">
      <img alt="Chips" class="w-full h-24 object-cover rounded-md mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/ALfevus61kneSphaiycCqvcjSUwzsA6ZZMYJyJ8zXIhkAFRoA.jpg" width="100"/>
      <p class="font-semibold">
       Chips
      </p>
      <p class="text-sm text-gray-500">
       Crispy and delicious chips.
      </p>
      <div class="flex justify-between items-center mt-2">
       <p class="font-semibold">
        $2.5
       </p>
       <button class="bg-blue-500 text-white p-2 rounded-full">
        <i class="fas fa-plus">
        </i>
       </button>
      </div>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md">
      <img alt="Orange Juice" class="w-full h-24 object-cover rounded-md mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/nvKw0RDboareMqxeGQgmhSYdrs2SY9hmFfT1Bvv6db9UAFRoA.jpg" width="100"/>
      <p class="font-semibold">
       Orange Juice
      </p>
      <p class="text-sm text-gray-500">
       Freshly squeezed orange juice.
      </p>
      <div class="flex justify-between items-center mt-2">
       <p class="font-semibold">
        $3.0
       </p>
       <button class="bg-blue-500 text-white p-2 rounded-full">
        <i class="fas fa-plus">
        </i>
       </button>
      </div>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md">
      <img alt="Bread" class="w-full h-24 object-cover rounded-md mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/62cWf5Dnf4iahEkxiJo8lqkReyUtfpurxv3kzqsdBX0jAKiQB.jpg" width="100"/>
      <p class="font-semibold">
       Bread
      </p>
      <p class="text-sm text-gray-500">
       Freshly baked bread.
      </p>
      <div class="flex justify-between items-center mt-2">
       <p class="font-semibold">
        $2.0
       </p>
       <button class="bg-blue-500 text-white p-2 rounded-full">
        <i class="fas fa-plus">
        </i>
       </button>
      </div>
     </div>
     <div class="p-4 bg-white rounded-md shadow-md">
      <img alt="Frozen Pizza" class="w-full h-24 object-cover rounded-md mb-2" height="100" src="https://storage.googleapis.com/a1aa/image/KSfcZnfEb2k7LkeJSRgyuh0BXV8jnw6wNymBDQS3nVOgAFRoA.jpg" width="100"/>
      <p class="font-semibold">
       Frozen Pizza
      </p>
      <p class="text-sm text-gray-500">
       Ready-to-bake frozen pizza.
      </p>
      <div class="flex justify-between items-center mt-2">
       <p class="font-semibold">
        $4.5
       </p>
       <button class="bg-blue-500 text-white p-2 rounded-full">
        <i class="fas fa-plus">
        </i>
       </button>
      </div>
     </div>
    </div>
   </div>
   <!-- Invoice Section -->
   <div class="w-1/2 bg-white p-6 shadow-md">
    <h2 class="text-lg font-semibold mb-4">
     Invoice
    </h2>
    <div class="space-y-4">
     <div class="flex items-center justify-between">
      <div class="flex items-center space-x-4">
       <img alt="Apple" class="w-12 h-12 rounded-md" height="50" src="https://storage.googleapis.com/a1aa/image/oyKJTK5lAfVBaaxEv3EQlq6OmbbgfDZqezKaDOtjffFmBUEhC.jpg" width="50"/>
       <div>
        <p class="font-semibold">
         Apple
        </p>
        <p class="text-sm text-gray-500">
         Fresh and juicy apples
        </p>
        <div class="flex items-center space-x-2">
         <button @click="quantities.apple > 0 ? quantities.apple-- : quantities.apple" class="bg-gray-200 text-gray-700 px-2 py-1 rounded">
          -
         </button>
         <p class="text-sm text-gray-500">
          Quantity: <span x-text="quantities.apple">
          </span>
         </p>
         <button @click="quantities.apple++" class="bg-gray-200 text-gray-700 px-2 py-1 rounded">
          +
         </button>
        </div>
       </div>
      </div>
      <p class="font-semibold">
       $3.5
      </p>
     </div>
     <div class="flex items-center justify-between">
      <div class="flex items-center space-x-4">
       <img alt="Carrot" class="w-12 h-12 rounded-md" height="50" src="https://storage.googleapis.com/a1aa/image/rblH0b7qBSYeKSphhNKbyoggm0UkwJZHR3OkzM2EGVCHQREKA.jpg" width="50"/>
       <div>
        <p class="font-semibold">
         Carrot
        </p>
        <p class="text-sm text-gray-500">
         Fresh and crunchy carrots
        </p>
        <div class="flex items-center space-x-2">
         <button @click="quantities.carrot > 0 ? quantities.carrot-- : quantities.carrot" class="bg-gray-200 text-gray-700 px-2 py-1 rounded">
          -
         </button>
         <p class="text-sm text-gray-500">
          Quantity: <span x-text="quantities.carrot">
          </span>
         </p>
         <button @click="quantities.carrot++" class="bg-gray-200 text-gray-700 px-2 py-1 rounded">
          +
         </button>
        </div>
       </div>
      </div>
      <p class="font-semibold">
       $2.0
      </p>
     </div>
     <div class="flex items-center justify-between">
      <div class="flex items-center space-x-4">
       <img alt="Milk" class="w-12 h-12 rounded-md" height="50" src="https://storage.googleapis.com/a1aa/image/TmJ9RxYYec2YFSl4nBZURW9COiR8gf5eyKjixI1gelK1AKiQB.jpg" width="50"/>
       <div>
        <p class="font-semibold">
         Milk
        </p>
        <p class="text-sm text-gray-500">
         Fresh dairy milk
        </p>
        <div class="flex items-center space-x-2">
         <button @click="quantities.milk > 0 ? quantities.milk-- : quantities.milk" class="bg-gray-200 text-gray-700 px-2 py-1 rounded">
          -
         </button>
         <p class="text-sm text-gray-500">
          Quantity: <span x-text="quantities.milk">
          </span>
         </p>
         <button @click="quantities.milk++" class="bg-gray-200 text-gray-700 px-2 py-1 rounded">
          +
         </button>
        </div>
       </div>
      </div>
      <p class="font-semibold">
       $1.5
      </p>
     </div>
    </div>
    <div class="mt-6">
     <h3 class="text-lg font-semibold mb-2">
      Payment Summary
     </h3>
     <div class="flex justify-between mb-2">
      <p class="text-sm text-gray-500">
       Sub Total
      </p>
      <p class="font-semibold">
       $7.0
      </p>
     </div>
     <div class="flex justify-between mb-2">
      <p class="text-sm text-gray-500">
       Tax
      </p>
      <p class="font-semibold">
       $0.5
      </p>
     </div>
     <div class="flex justify-between mb-4">
      <p class="text-sm text-gray-500">
       Total Payment
      </p>
      <p class="font-semibold">
       $7.5
      </p>
     </div>
     <div class="flex