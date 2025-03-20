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
        Schema::table('pelanggan', function (Blueprint $table) {
            // // Tambahkan kolom email
            $table->string('email')->unique()->after('no_telp');
            
            // Tambahkan kolom point
            $table->unsignedInteger('point')->default(0)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            //
        });
    }
};
