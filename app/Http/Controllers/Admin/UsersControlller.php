<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View as FacadesView;
//import Facades Storage
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

class UsersControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //
        $users = User::paginate(20);
        return view('content.admin.user', compact('users')); // Pass username to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('content.admin.user-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // //
        // dd($request->all());
        // dd($user->id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'usernama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'hp' => 'required|string|max:15',
            'alamat' => 'nullable|string',
            'profile_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_priv' => 'required|in:admin,petugas',
        ]);


        // Handle upload file prifile
        // Debugging: Lihat nilai profilePath
        // dd($profilePath);

        // simpan data ke database
        User::create([
            'name' => $request->name,
            'usernama' => $request->usernama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'profile_picture' => $request->file('profile_file')->store('profiles', 'public'),
            'user_priv' => $request->user_priv,
        ]);
        
        // redirect atau respon berhasil
        return redirect()->route('admin.users.index')->with('success', 'User baru berhasil ditambahkan');
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
    public function edit($id): View
    {
        //
        $user = User::findOrFail($id);
        return view('content.admin.user-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
        // dd($request->all());
        Log::info('Proses update dimulai', ['id' => $id]);
        $user = User::find($id);
        if ($user) {
            $user->update($request->all());
            if ($request->hasFile('profile_file')) {
                $image = $request->file('profile_file');
                $path = $image->store('profiles', 'public');
                $user->profile_picture = $path;
                $user->save();
            }
            Log::info('Data berhasil diupdate', ['data' => $user]);
            return redirect()->route('admin.users.index')->with('success', 'Data berhasil diupdate');
        } else {
            Log::warning('User tidak ditemukan', ['id' => $id]);
        }
        
        
        $request->validate([
            'name' => 'required|string|max:255',
            'usernama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'hp' => 'required|string|max:15',
            'alamat' => 'nullable|string',
            'profile_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_priv' => 'required|in:admin,petugas',
        ]);
        
        $user = User::find($id);
        // dd($request->all(), $user);
        $updateData = [
            'name' => $request->name,
            'usernama' => $request->usernama,
            'email' => $request->email,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'user_priv' => $request->user_priv,
        ];

        if ($request->hasFile('profile_file')) {
             // Proses upload file
            $image = $request->file('profile_file');
            $path = $image->store('profiles', 'public');

             // Hapus file lama jika ada
            if ($user->profile_picture && Storage::disk('profiles','public')->exists($user->profile_picture)) {
                Storage::disk('profiles','public')->delete($user->profile_picture);
            }

             // Tambahkan nama file ke array update
            $updateData['profile_picture'] = $path;

            Log::info('File profile berhasil diunggah', ['path' => $path]);
        } 
        
         // Simpan data ke database
        $user->update($updateData);
        // Log::info('Data setelah update', ['data' => $user->toArray()]);


        return redirect()->route('admin.users.inidex')->with('success', 'User berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);

        if ($user) {
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
        } else {
            return redirect()->route('admin.users.index')->with('error', 'User tidak ditemukan');
        }
    }
}
