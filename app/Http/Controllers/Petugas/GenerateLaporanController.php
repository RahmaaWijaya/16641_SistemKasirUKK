<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection; // Import Collection

class GenerateLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil input tanggal dari form
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Jika tidak ada filter, tampilkan semua data
        if (!$startDate || !$endDate) {
            $penjualan = DB::select("CALL GetLaporanPenjualan(CURDATE() - INTERVAL 30 DAY, CURDATE())");
        } else {
            $penjualan = DB::select("CALL GetLaporanPenjualan(?, ?)", [$startDate, $endDate]);
        }
         // Konversi array ke Collection
        $penjualan = collect($penjualan);
        return view('content.petugas.generatelaporan', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showDetail($id)
    {
        $penjualan = Penjualan::where('id_penjualan', $id)->firstOrFail();

        // Ambil detail transaksi berdasarkan ID Penjualan
        $detail_penjualan = DetailPenjualan::where('id_penjualan', $id)
            ->join('produk', 'detail_penjualan.id_produk', '=', 'produk.id_produk')
            ->select('detail_penjualan.*','detail_penjualan.harga_saat_transaksi','detail_penjualan.potongan_saat_transaksi','detail_penjualan.diskon_saat_transaksi', 'produk.nama_produk', 'produk.harga_jual', 'produk.potongan_harga', 'produk.diskon')
            ->get();

        return view('content.petugas.generatelaporan_detail', compact('penjualan', 'detail_penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
