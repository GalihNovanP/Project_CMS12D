<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; 
    protected $fillable = ['id_produk', 'nama_produk', 'harga', 'stok'];


    protected $primaryKey = 'id'; 

    public $incrementing = false; 
    protected $keyType = 'string';

    public static function getAll()
    {
        return Produk::all();
    }

    public static function find($id)
    {
        return Produk::where('id', $id)->first();
    }
}