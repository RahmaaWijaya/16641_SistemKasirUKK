<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori'; // Kolom primary key
    protected $fillable= [
        'id_kategori',
        'nama_kategori',
        'created_at',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori', 'id_kategori');
    }
}
