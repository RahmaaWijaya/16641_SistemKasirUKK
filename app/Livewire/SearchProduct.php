<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Produk;

class SearchProduct extends Component
{
    public $search = ''; // Input pencarian
    public $products = []; // Data produk hasil pencarian

    public function searchProduct()
    {
        if (strlen($this->search) > 1) {
            $this->products = Produk::where('nama_produk', 'like', "%{$this->search}%")
            ->orWhere('barcode', 'like', "%{$this->search}%")
            ->take(10) // Batasi jumlah hasil
            ->get();

            dd($this->products); // Tambahkan ini untuk debugging
        
        } else {
            $this->products = [];
        }
        dd(Produk::where('nama_produk', 'like', "%{$this->search}%")
        ->orWhere('barcode', 'like', "%{$this->search}%")
        ->get());

    }

    public function updatedSearch()
    {
        $this->searchProduct();
    }


    public function render()
    {
        return view('livewire.search-product');
    }
}
