<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Pelanggan extends Model
{
    //
    use HasFactory;

    protected $table = 'pelanggan'; // Nama tabel di database
    protected $primaryKey = 'id_pelanggan'; // Primary Key
    public $timestamps = true; // Aktifkan timestamps jika kolom created_at & updated_at ada

    protected $fillable = [
        'id_pelanggan',
        'nama',
        'alamat',
        'no_telp',
        'email',
        'point',
        'barcode',
    ];
    // Generate barcode sebelum menyimpan data
    protected static function boot() {
        parent::boot();
        static::creating(function ($pelanggan) {
            $pelanggan->barcode = self::generateUniqueBarcode();
        });
    }

    // Fungsi untuk membuat barcode unik
    private static function generateUniqueBarcode() {
        do {
            $barcode = Str::random(12); // Buat barcode dengan 12 karakter acak
        } while (self::where('barcode', $barcode)->exists()); // Pastikan tidak ada yang duplikat

        return $barcode;
    }
}
