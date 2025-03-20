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
            $table->decimal('diskon', 5, 2)->nullable()->after('harga_jual'); // Diskon dalam persentase, misalnya 10.50%
            $table->string('foto_produk')->nullable()->after('stok'); // Path ke foto produk
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            //
            $table->dropColumn('diskon', 'foto_produk');
        });
    }
};
