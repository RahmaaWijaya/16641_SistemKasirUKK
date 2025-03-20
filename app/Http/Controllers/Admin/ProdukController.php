<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //
        $produks = Produk::paginate(20);
        return view('content.admin.produk', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('content.admin.produk-add', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'id_kategori' => 'required|numeric',
            'nama_produk' => 'required|string|max:255',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'diskon' => 'nullable|numeric',
            'potongan_harga' => 'nullable|numeric',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'barcode' => 'required|string|max:255',
        ]);

        // Handle upload file prifile
        
        Produk::create([
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'diskon' => $request->diskon,
            'potongan_harga' => $request->potongan_harga,
            'foto_produk' => $request->file('foto_produk')->store('produk', 'public'),
            'barcode' => $request->barcode,
        ]);
        // Redirect to produk.index
        return redirect()->route('admin.produk.index')->with('success', 'Data Produk Berhasil Ditambahkan');
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
        $kategori = Kategori::all();
        $produk = Produk::find($id);
        return view('content.admin.produk-edit', [
            'produk' => $produk,
            'kategori' => $kategori, // Data semua kategori
            'selectedKategori' => $produk->id_kategori, // ID kategori yang dipilih
        ]);
        
        // return view('content.admin.produk-edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'id_kategori' => 'required|numeric',
            'nama_produk' => 'required|string|max:255',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'diskon' => 'nullable|numeric',
            'potongan_harga' => 'nullable|numeric',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'barcode' => 'required|string|max:255',
        ]);
        // simpan data ke database
        $produk = Produk::find($id);
        $produk->update([
            'id_kategori' => $request->id_kategori,
            'nama_produk' => $request->nama_produk,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'diskon' => $request->diskon,
            'potongan_harga' => $request->potongan_harga,
            'barcode' => $request->barcode,
        ]);
        // handle upload file foto_produk
        if ($request->hasFile('foto_produk')) {
            $image = $request->file('foto_produk');
            $path = $image->store('produk', 'public');
            if ($produk->foto_produk) {
                Storage::disk('public')->delete($produk->foto_produk);
            }
            $produk->foto_produk = $path;
            $produk->save();
        }
        
        return redirect()->route('admin.produk.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produk = Produk::find($id);
        if ($produk->foto_produk) {
            Storage::disk('public')->delete($produk->foto_produk);
        }
        $produk->delete();
        // Redirect to produk.index
        return redirect()->route('admin.produk.index')->with('success', 'Data berhasil dihapus');
    }
}
