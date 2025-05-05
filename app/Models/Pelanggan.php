<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans'; 
    protected $fillable = ['nama', 'alamat', 'email'];

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