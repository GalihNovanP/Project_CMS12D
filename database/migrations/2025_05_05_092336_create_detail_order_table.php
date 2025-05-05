<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('id_order');  
            $table->unsignedBigInteger('id_produk'); 
            $table->integer('jumlah_produk'); 
            $table->decimal('harga_produk', 10, 2);  
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_orders');
    }
};
