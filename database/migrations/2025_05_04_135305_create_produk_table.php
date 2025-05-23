<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id(); // ID Produk (otomatis)
            $table->string('nama_produk'); // Nama Produk
            $table->decimal('harga', 10, 2); // Harga (desimal 2 digit di belakang koma)
            $table->integer('stok'); // Stok (bilangan bulat)
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
