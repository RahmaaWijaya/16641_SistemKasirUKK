<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Log;

class TestComponent extends Component
{
//     public $selectedCategory = null;
//     public $produks = [];
//     public $kategori = [];

//     public function mount()
//     {
//         $this->kategori = Kategori::all();
//         $this->produks = Produk::with('kategori')->get(); // Mengambil semua produk dengan kategori
//     }

//     public function testLivewire()
// {
//     dd('Livewire Berjalan!');
// }


//     public function filterProduk($kategoriId)
//     {
//         logger('Kategori ID: ' . $kategoriId); // Log ke storage/logs/laravel.log
//         $this->selectedCategory = $kategoriId;
//         $this->produks = Produk::where('id_kategori', (int) $kategoriId)->get();
//         $this->emit('produkDiperbarui'); // Mengirim event ke browser
//     }
//     public function render()
//     {
//         return view('livewire.test-component', [
//             'kategoris' => Kategori::all(),
//             'produks' => $this->produks
//         ]);
//     }
public $selectedCategory = null;
public $produks = [];
public $kategori = [];
public $search = ''; // Properti untuk pencarian

public function mount()
{
    $this->kategori = Kategori::all();
    $this->produks = Produk::with('kategori')->get();
}

public function updatedSearch()
{
    $this->produks = Produk::where('nama', 'like', "%{$this->search}%")
        ->orWhere('barcode', 'like', "%{$this->search}%")
        ->get();

    $this->emit('produkDiperbarui');
}

//protected $listeners = ['addProductToOrder'];

    //public function addProductToOrder($produkId)
    //{
        //$produk = Produk::find($produkId);
        //if ($produk) {
            //session()->push('cart', $produk);
           // $this->emit('produkDikirim', [
                //'id' => $produk->id_produk,
                //'nama' => $produk->nama_produk,
                //'harga' => number_format($produk->harga_jual, 0, ',', '.'),
                //'gambar' => asset('storage/' . $produk->foto_produk),
                //'diskon_persen' => $produk->diskon ?? 0,
                //'diskon_nominal' => $produk->potongan_harga ?? 0,
            //]);
       // }
    //}
    public $produkTerpilih = [];

    protected $listeners = ['addProductToOrder' => 'addProductToOrder'];

    public function addProductToOrder($data)
    {
        Log::info('Produk ID diterima di dashboard3: ' . json_encode($data));

        if (isset($data['id'])) {
            $this->produkTerpilih[] = $data['id'];
        } else {
            Log::error('Data produk tidak valid: ' . json_encode($data));
        }
    }

public function render()
{
    return view('livewire.test-component', [
        'kategoris' => Kategori::all(),
        'produks' => $this->produks
    ]);

    return view('livewire.dashboard3', [
        'produkTerpilih' => $this->produkTerpilih
    ]);
}

    
}
