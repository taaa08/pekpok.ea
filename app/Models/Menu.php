<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'harga_before',
        'harga_after',
        'promo',
        'masa_berlaku',
        'keterangan',
        'gambar'
    ];


}
