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
        Schema::table('detail_penjualan', function (Blueprint $table) {
            //
            $table->decimal('harga_saat_transaksi', 10, 0)->nullable()->after('id_produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_penjualan', function (Blueprint $table) {
            //
        });
    }
};
