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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->unsignedBigInteger('id_kategori');
            $table->string('nama_produk');
            $table->decimal('harga_beli', 10,3);
            $table->decimal('harga_jual', 10,3);
            $table->smallInteger('stok');
            $table->string('barcode');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
