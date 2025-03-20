<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {
             // Ubah tipe data kolom `diskon` menjadi tinyint
             $table->tinyInteger('diskon')->nullable()->change();
            
             // Ubah tipe data kolom `total_harga` menjadi decimal tanpa skala
             $table->decimal('total_harga', 10, 0)->nullable()->change();
             $table->decimal('bayar', 10, 0)->nullable()->change();
             $table->decimal('kembalian', 10, 0)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {
        });
    }
};
