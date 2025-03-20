<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        // Ambil semua kategori
        $kategoris = Kategori::all();
        $products = Produk::all();
        $pelanggan = Pelanggan::all();
        $members = Pelanggan::select('id_pelanggan', 'barcode', 'nama', 'point')->get();
        return view('content.petugas.dashboard3', compact('kategoris', 'products', 'pelanggan', 'members'));
    }

    public function getProduct($barcode)
    {
        $product = Produk::where('barcode', $barcode)->first();
        if ($product) {
            return response()->json([
                'success' => true,
                'product' => [
                    'id' => $product->id_produk,
                    'nama' => $product->nama_produk,
                    'harga' => $product->harga_jual,
                    'kategori' => optional($product->kategori)->nama_kategori,
                    'stok' => $product->stok,
                    'barcode' => $product->barcode,
                    'gambar' => asset('storage/' . $product->foto_produk),
                    'diskon_persen' => $product->diskon,
                    'diskon_nominal'=> $product->potongan_harga,
                ],
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ]);
        }
    }

    public function search(Request $request)
    {
        $query = $request->q;
        $products = Produk::where('nama_produk', 'like', "%{$query}%")
                        ->orWhere('barcode', 'like', "%{$query}%")
                        ->limit(10)
                        ->get();

         // Mengubah struktur respons agar sesuai dengan /get-product
        $response = [];
        foreach ($products as $product) {
            $response[] = [
                'id' => $product->id_produk,
                'nama' => $product->nama_produk,
                'harga' => number_format($product->harga_jual, 0, ',', '.'),
                'gambar' => asset('storage/' . $product->foto_produk),
                'diskon_persen' => $product->diskon,
                'diskon_nominal' => $product->potongan_harga,
                'barcode' => $product->barcode,
            ];
        }
        return response()->json($response);
    }
    public function searchMember(Request $request)
    {
        $query = $request->input('query');
        $members = Pelanggan::where('nama', 'LIKE', "%{$query}%")
            ->orWhere('barcode', 'LIKE', "%{$query}%")
            ->select('id_pelanggan', 'nama', 'point')
            ->get();
    
        return response()->json(['members' => $members]);
    }    
}
