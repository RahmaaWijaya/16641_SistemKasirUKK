<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukKategori extends Component
{
    public $selectedCategory = null;
    public $produks = [];

    public function mount()
    {
        $this->produks = []; // Awalnya kosong, hanya akan diisi setelah kategori diklik
    }

    public function testLivewire()
{
    dd('Livewire Berjalan!');
}


    public function filterProduk($kategoriId)
    {
        $this->selectedCategory = $kategoriId;
        $this->produks = Produk::where('id_kategori', $kategoriId)->get();
    }

    public function render()
    {
        return view('livewire.produk-kategori', [
            'kategoris' => Kategori::all(),
            'produks' => $this->produks
        ]);
    }
}
