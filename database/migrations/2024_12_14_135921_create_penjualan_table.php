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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('id_pelanggan');
            $table->decimal('diskon', 10,3)->nullable();
            $table->decimal('total_harga', 10,3)->nullable();
            $table->decimal('bayar', 10,3)->nullable();
            $table->decimal('kembalian', 10,3)->nullable();
            $table->timestamp('tanggal_penjualan')->nullable();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
