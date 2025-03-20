<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    //
    use HasFactory;
    protected $table = 'detail_penjualan';
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_penjualan', 'id_produk', 'harga_saat_transaksi', 'potongan_saat_transaksi', 'diskon_saat_transaksi', 'jumlah', 'subtotal'];
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }
}
