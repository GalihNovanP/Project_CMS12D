<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; 
    protected $fillable = ['nama_produk', 'harga', 'stok'];

    protected $primaryKey = 'id'; 

    public $incrementing = false; 
    protected $keyType = 'string';

    public static function getAll()
    {
        return Pelanggan::all();
    }

    public static function find($id)
    {
        return Pelanggan::where('id', $id)->first();
    }
}