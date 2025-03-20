<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'id_produk'; // Kolom primary key
    protected $fillable = [
        'id_produk',
        'id_kategori',
        'nama_produk',
        'harga_beli',
        'harga_jual',
        'stok',
        'diskon',
        'potongan_harga',
        'foto_produk',
        'barcode',
        'created_at',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
