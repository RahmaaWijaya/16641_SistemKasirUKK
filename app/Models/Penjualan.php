<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    //
    use HasFactory;
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    public $incrementing = true; // Jika auto-increment
    protected $fillable = [
        'id','id_penjualan', 'id_pelanggan', 'diskon', 'total_harga', 'bayar', 'kembalian', 'tanggal_penjualan',
    ];
    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan');
    }
}
