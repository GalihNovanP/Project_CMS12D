<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders'; // Nama tabel

    protected $fillable = ['tanggal_order', 'jumlah_order']; // Kolom yang bisa diisi

    protected $primaryKey = 'id'; // Primary key default

    public $incrementing = true; // ID bertipe auto increment
    protected $keyType = 'int'; // Tipe data ID

    // Ambil semua data order
    public static function getAll()
    {
        return self::all();
    }

    // Cari order berdasarkan ID
    public static function findById($id)
    {
        return self::where('id', $id)->first();
    }
}
