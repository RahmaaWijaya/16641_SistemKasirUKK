<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pelanggan = Pelanggan::paginate(20);
        return view('content.petugas.member', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('content.petugas.member-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
            $request->validate([
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string',
                'no_telp' => 'required|string|max:15',
                'email' => 'required|email|unique:pelanggan,email',
                'point' => 'nullable|integer|min:0',
            ]);
    
            Pelanggan::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'email' => $request->email,
                'point' => $request->point ?? 0,
            ]);
    
            return redirect()->route('petugas.member.index')->with('success', 'Member berhasil ditambahkan!');
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
    public function edit(string $id) : View
    {
        //
        $pelanggan = Pelanggan::findOrFail($id);
        return view('content.petugas.member-edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:pelanggan,email,' . $id . ',id_pelanggan',
            'point' => 'nullable|integer|min:0',
        ]);
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'point' => $request->point ?? 0,
        ]);
        return redirect()->route('petugas.member.index')->with('success', 'Member berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('petugas.member.index')->with('success', 'Member berhasil dihapus!');
    }
}
