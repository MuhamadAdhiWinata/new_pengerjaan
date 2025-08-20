<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $connection = 'mysql_fe';   // DB kedua
    protected $table = 'at_jenis';
    protected $primaryKey = 'kd';
    public $timestamps = false;

    protected $fillable = [
        'jenis',
        'kd_cabang',
        'waktu',
        'acak',
        'musik',
        'member_username',
        'kode',
        'tipe_pengerjaan',
        'soal_generate',
        'link_embed',
        'status_akm',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'kd_jenis', 'kd');
    }
}
