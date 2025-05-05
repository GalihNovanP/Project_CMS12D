<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id(); // ID Pembayaran (primary key)
            $table->unsignedBigInteger('id_order'); // ID Order (tanpa foreign key)
            $table->string('metode_pembayaran'); // Metode Pembayaran
            $table->date('tanggal_pembayaran'); // Tanggal Pembayaran
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
