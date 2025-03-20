<div>
    <div class="relative w-full lg:w-1/2">
        <div class="flex items-center border rounded-lg p-2 w-full">
            <input 
                wire:model.debounce.500ms="search"  
                class="p-2 border-none outline-none w-full" 
                placeholder="Search a product by name or barcode" 
                type="text"
            />
            <button wire:click="searchProduct">
                <i class="fas fa-search text-gray-500 ml-2 cursor-pointer"></i>
            </button>
        </div>
        <p class="text-red-500 mt-2">Search Value: {{ $search }}</p>
        <!-- Hasil pencarian -->
        @if(count($products) > 0)
        <pre>{{ print_r($products) }}</pre>  {{-- Debugging --}}
            <ul class="absolute w-full bg-white shadow-lg rounded-lg mt-2 max-h-60 overflow-y-auto z-50">
                @foreach($products as $product)
                    <li wire:click="$emit('productSelected', {{ $product->id }})"
                        class="p-2 border-b cursor-pointer hover:bg-gray-100">
                        {{ $product->nama }} - <span class="text-gray-500">{{ $product->barcode }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('productSelected', productId => {
                fetch(`/get-product/${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            addProductToOrder(data.product);
                        } else {
                            alert("Produk tidak ditemukan!");
                        }
                    })
                    .catch(error => console.error("Error:", error));
            });
        });
    </script>
    
    
    
</div>
