<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        Log::info('Data yang diterima:', $request->all()); 
        //dd($request->all());  Cek data sebelum diproses
        // Pastikan user login
        if (!Auth::check()) {
            return response()->json(['message' => 'User tidak terautentikasi'], 401);
        }
        // Validasi data
        $request->validate([
            'id_pelanggan' => 'nullable|exists:pelanggan,id_pelanggan',
            'diskon' => 'nullable|numeric|min:0',
            'total_harga' => 'required|numeric|min:0',
            'bayar' => 'required|numeric|min:0',
            'kembalian' => 'required|numeric|min:0',
            'items' => 'required|array',
            'items.*.id_produk' => 'required|exists:produk,id_produk',
            'items.*.harga_saat_transaksi' => 'required|numeric|min:0',  // Tambahkan validasi harga
            'items.*.potongan_saat_transaksi' => 'nullable|numeric|min:0',
            'items.*.diskon_saat_transaksi' => 'nullable|numeric|min:0',
            'items.*.jumlah' => 'required|integer|min:1',
            'items.*.subtotal' => 'required|numeric|min:0',
        ]);
        try {
            DB::beginTransaction();
            // Simpan ke tabel penjualan
            $penjualan = Penjualan::create([
                'id_penjualan' => $request->id_penjualan,
                'id' =>auth()->user()->id ?? null, // Tambahkan id petugas
                'id_pelanggan' => $request->id_pelanggan,
                'diskon' => $request->diskon,
                'total_harga' => $request->total_harga,
                'bayar' => $request->bayar,
                'kembalian' => $request->kembalian,
                'tanggal_penjualan' => Carbon::now(),
            ]);
            // simpan tabel ke detail_penjualan
            foreach ($request->items as $item) {
                Log::info('Item sebelum disimpan:', $item);
                DetailPenjualan::create([
                    'id_penjualan' => $penjualan->getKey(),
                    'id_produk' => $item['id_produk'],
                    'harga_saat_transaksi' => (float)$item['harga_saat_transaksi'],
                    'potongan_saat_transaksi' => (float)$item['potongan_saat_transaksi'] ?? 0,
                    'diskon_saat_transaksi' => (float)$item['diskon_saat_transaksi'] ?? 0,
                    'jumlah' => $item['jumlah'],
                    'subtotal' => $item['subtotal'],
                ]);
            }
            DB::commit();
            return response()->json(['message' => 'Tansaksi berhasil disimpan', 'penjualan' => $penjualan], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            // Debugging di log Laravel
            Log::error('Terjadi kesalahan saat menyimpan transaksi', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Terjadi Kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
