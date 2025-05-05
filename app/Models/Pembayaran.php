<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans'; // Nama tabel

    protected $fillable = [
        'id_order',
        'metode_pembayaran',
        'tanggal_pembayaran',
    ]; // Kolom yang bisa diisi

    protected $primaryKey = 'id'; // Primary key default

    public $incrementing = true; // ID bertipe auto increment
    protected $keyType = 'int';   // Tipe data ID

    // Ambil semua data pembayaran
    public static function getAll()
    {
        return self::all();
    }

    // Cari pembayaran berdasarkan ID
    public static function findById($id)
    {
        return self::where('id', $id)->first();
    }
}
