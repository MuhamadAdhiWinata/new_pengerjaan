<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanAkm extends Model
{
    /** @use HasFactory<\Database\Factories\JawabanAkmFactory> */
    use HasFactory;
    protected $connection = 'mysql_fe';   // DB kedua
    protected $table = 'akm_jawaban';
    protected $primaryKey = 'kd';
    public $timestamps = false;

    protected $fillable = [
        'kd_peserta',
        'kd_ijin',
        'kd_jenis',
        'waktu',
        'sisa',
        'kd_materi',
        'soal_didapat',
        'soal_dikerjakan',
        'waktu_mulai',
        'waktu_selesai',
        'status_mengerjakan',
        'status_reset',
        'jawaban',
        'upload',
    ];
}
