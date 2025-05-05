<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_orders'; // Nama tabel

    protected $fillable = [
        'id_order',
        'id_produk',
        'jumlah_produk',
        'harga_produk',
    ]; // Kolom yang bisa diisi

    protected $primaryKey = 'id'; // Primary key default

    public $incrementing = true; // ID bertipe auto increment
    protected $keyType = 'int';   // Tipe data ID

    // Ambil semua data detail order
    public static function getAll()
    {
        return self::all();
    }

    // Cari detail order berdasarkan ID
    public static function findById($id)
    {
        return self::where('id', $id)->first();
    }
}
