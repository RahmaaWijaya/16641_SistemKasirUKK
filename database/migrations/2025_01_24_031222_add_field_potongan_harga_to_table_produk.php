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
        Schema::table('produk', function (Blueprint $table) {
            //
             // Menambahkan field potongan_harga dengan tipe data decimal(10,0)
             $table->decimal('potongan_harga', 10, 0)->nullable()->after('diskon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            // // Menghapus field potongan_harga
            $table->dropColumn('potongan_harga');
        });
    }
};
