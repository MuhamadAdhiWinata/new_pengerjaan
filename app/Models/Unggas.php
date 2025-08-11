<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unggas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'jumlah',
        'harga',
        'tanggal_masuk',
        'aktif',
    ];
}
