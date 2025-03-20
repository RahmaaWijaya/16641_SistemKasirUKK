<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index() : View
    {
         // Ambil jumlah total produk yang terjual berdasarkan id_produk
         $penjualan = DetailPenjualan::select('id_produk', DB::raw('SUM(jumlah) as total_terjual'))
         ->groupBy('id_produk')
         ->orderByDesc('total_terjual')
         ->take(5) // Ambil 5 produk terlaris
         ->get();

        // Ambil nama produk berdasarkan id_produk
        $labels = [];
        $data = [];
        $colors = ['#3498db', '#1abc9c', '#9b59b6', '#f1c40f', '#e74c3c']; // Warna untuk pie chart

        foreach ($penjualan as $key => $item) {
            $produk = Produk::find($item->id_produk);
            if ($produk) {
                $labels[] = $produk->nama_produk;
                $data[] = $item->total_terjual;
            }
        }
        $totalPenjualan = Penjualan::count(); // Hitung jumlah penjualan
        $totalPendapatan = Penjualan::sum('total_harga'); // Hitung total pendapatan
        $totalProduk = Produk::count(); // Hitung jumlah produk
        $totalPelanggan = Pelanggan::count(); // Hitung jumlah pelanggan
        return view('content.admin.dashboard', compact('totalPelanggan', 'totalProduk', 'totalPenjualan', 'totalPendapatan','labels', 'data', 'colors'));
    }
    public function dashboard()
    {
       

        return view('content.admin.dashboard', compact('labels', 'data', 'colors'));
    }

}
