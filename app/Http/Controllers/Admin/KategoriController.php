<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //
        $kategory = Kategori::paginate(20);
        return view('content.admin.kategori', compact('kategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('content.admin.kategori-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            // 'created_at' => 'required|date',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            // 'created_at' => $request->created_at,
        ]);
        // Redirect to kategori.index
        return redirect()->route('admin.kategori.index')->with('success', 'Data Kategori Berhasil Ditambahkan');
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
    public function edit(string $id): View
    {
        //
        $kategori = Kategori::find($id);
        return view('content.admin.kategori-edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::find($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        // Redirect to kategori.index
        return redirect()->route('admin.kategori.index')->with('success', 'Data Berhasil Diupdate');
        // if ($kategori) {
        //     $kategori->update($request->all());
        //     return redirect()->route('kategori.index')->with('success', 'Data Berhasil Diupdate');
        // } else {
        //     Log::warning('Kategori tidak ditemukan', ['id' => $id]);
        // }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kategori = Kategori::find($id);
        $kategori->delete();
        // Redirect to kategori.index
        return redirect()->route('admin.kategori.index')->with('success', 'Data Berhasil Dihapus');
    }
}
