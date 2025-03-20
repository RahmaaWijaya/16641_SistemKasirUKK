<?php

use App\Http\Controllers\DashboardController as MainDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\QRCodeController;
use Illuminate\Support\Facades\Route;
use App\Models\Produk;
use Illuminate\Http\Request;

use Livewire\Livewire;
use App\Http\Livewire\ProdukKategori;
use App\Livewire\TestComponent;
use App\Http\Controllers\Petugas\TransaksiController;
use App\Http\Livewire\Kategori\Index as KategoriIndex;
use PhpParser\Node\Expr\FuncCall;

Livewire::component('produk-kategori', ProdukKategori::class);
Livewire::component('test-component', TestComponent::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/scan-qr', function () {
    return view('qr-code');
});

Route::get('/login',[\App\Http\Controllers\AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[\App\Http\Controllers\AuthController::class, 'verify'])->name('auth.verify');

Route::group(['middleware'=>'auth:admin'], function(){
    Route::get('/admin/dashboard',[\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::get('/admin/laporan', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin.dashboard.chart');

    // bagian admin users
    Route::get('/admin/users',[\App\Http\Controllers\Admin\UsersControlller::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/edit/{id}',[\App\Http\Controllers\Admin\UsersControlller::class, 'edit'])->name('admin.usersedit.index');
    Route::put('/admin/users/update/{id}',[\App\Http\Controllers\Admin\UsersControlller::class, 'update'])->name('admin.usersupdate.index');
    Route::get('/admin/users/add',[\App\Http\Controllers\Admin\UsersControlller::class, 'create'])->name('admin.usersadd.index');
    Route::post('/admin/users/store',[\App\Http\Controllers\Admin\UsersControlller::class, 'store'])->name('admin.store');
    Route::post('/admin/users/delete/{id}',[\App\Http\Controllers\Admin\UsersControlller::class, 'destroy'])->name('admin.usersdelete');
    // bagian admin kategori
    Route::get('/admin/kategori', [\App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori/add', [\App\Http\Controllers\Admin\KategoriController::class, 'create'])->name('admin.addkategori');
    Route::post('/admin/kategori/store', [\App\Http\Controllers\Admin\KategoriController::class, 'store'])->name('admin.storekategori');
    Route::get('/admin/kategori/edit/{id}', [\App\Http\Controllers\Admin\KategoriController::class, 'edit'])->name('admin.editkategori');
    Route::put('/admin/kategori/update/{id}', [\App\Http\Controllers\Admin\KategoriController::class, 'update'])->name('admin.updatekategori');
    Route::post('/admin/kategori/delete/{id}', [\App\Http\Controllers\Admin\KategoriController::class, 'destroy'])->name('admin.deletekategori');
    // bagian admin laporan
    Route::get('/admin/laporan', [\App\Http\Controllers\Admin\LaporanController::class, 'index'])->name('admin.laporan.index');
    Route::get('/admin/laporan/{id}', [\App\Http\Controllers\Admin\LaporanController::class, 'show'])->name('admin.laporan.show');
    // bagia admin produk
    Route::get('/admin/produk', [\App\Http\Controllers\Admin\ProdukController::class, 'index'])->name('admin.produk.index');
    Route::get('/admin/produk/add', [\App\Http\Controllers\Admin\ProdukController::class, 'create'])->name('admin.addproduk');
    Route::post('/admin/produk/store', [\App\Http\Controllers\Admin\ProdukController::class, 'store'])->name('admin.storeproduk');
    Route::get('/admin/produk/edit/{id}', [\App\Http\Controllers\Admin\ProdukController::class, 'edit'])->name('admin.editproduk');
    Route::put('/admin/produk/update/{id}', [\App\Http\Controllers\Admin\ProdukController::class, 'update'])->name('admin.updateproduk');
    Route::post('/admin/produk/delete/{id}', [\App\Http\Controllers\Admin\ProdukController::class, 'destroy'])->name('admin.deleteproduk');
});

Route::group(['middleware'=>'auth:petugas'], function(){
    Route::get('/petugas/dashboard', [\App\Http\Controllers\Petugas\DashboardController::class, 'index'])->name('petugas.dashboard.index');
    Route::get('/petugas/produk', [\App\Http\Controllers\Petugas\KategoriController::class, 'index'])->name('petugas.produk.index');
    Route::get('/get-product/{barcode}', function ($barcode) {
        $product = Produk::where('barcode', $barcode)->first();
    
        if ($product) {
            return response()->json([
                'success' => true,
                'product' => [
                    'id' => $product->id_produk,
                    'nama' => $product->nama_produk,
                    'harga' => number_format($product->harga_jual, 0, ',', '.'),
                    'gambar' => asset('storage/' . $product->foto_produk),
                    'diskon_persen' => $product->diskon,
                    'diskon_nominal' => $product->potongan_harga,
                ]
            ]);
        }
    
        return response()->json(['success' => false]);
    });

    Route::get('/get-product/{id}', function ($id) {
        $product = Produk::find($id);
        if ($product) {
            return response()->json(['success' => true, 'product' => $product]);
        } else {
            return response()->json(['success' => false]);
        }
    });
    Route::get('/search-product', [\App\Http\Controllers\Petugas\DashboardController::class, 'search']);
    // bagian member
    Route::get('/petugas/member', [\App\Http\Controllers\Petugas\MemberController::class, 'index'])->name('petugas.member.index');
    Route::get('/petugas/member/add', [\App\Http\Controllers\Petugas\MemberController::class, 'create'])->name('petugas.member.add');
    Route::post('/petugas/member/store', [\App\Http\Controllers\Petugas\MemberController::class, 'store'])->name('petugas.member.store');
    Route::get('/petugas/member/edit/{id}', [\App\Http\Controllers\Petugas\MemberController::class, 'edit'])->name('petugas.member.edit');
    Route::put('/petugas/member/update/{id}', [\App\Http\Controllers\Petugas\MemberController::class, 'update'])->name('petugas.member.update');
    Route::post('/petugas/member/delete/{id}', [\App\Http\Controllers\Petugas\MemberController::class, 'destroy'])->name('petugas.member.delete');
    Route::get('/petugas/search-member', [\App\Http\Controllers\Petugas\DashboardController::class, 'searchMember']);
    // bagian transaksi
    Route::post('/transaksi/store', [\App\Http\Controllers\Petugas\TransaksiController::class, 'store'])->name('transaksi.store');
    //bagain nota
    Route::get('/nota', Function(){
        return view('content.petugas.nota');
    });
    // bagian Generate Laporan
    Route::get('/petugas/generate-laporan', [\App\Http\Controllers\Petugas\GenerateLaporanController::class, 'index'])->name('petugas.generatelaporan.index');
    Route::get('/petugas/generate-laporan/{id}', [\App\Http\Controllers\Petugas\GenerateLaporanController::class, 'showDetail'])->name('petugas.generatelaporan.show');
});

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');