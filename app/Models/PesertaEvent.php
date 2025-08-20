<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaEvent extends Model
{
    /** @use HasFactory<\Database\Factories\PesertaEventFactory> */
    use HasFactory;
    protected $table = 'at_peserta_perevent';
    protected $primaryKey = 'kd';
    public $timestamps = false;

    protected $fillable = [
        'kd_peserta',
        'kd_master_event',
        'status_aktif',
        'kd_cabang',
        'id_jurusan1',
        'id_jurusan2',
        'kd_kelas',
        'id_sekolah',
        'instansi_sekolah',
        'kelas_semester',
        'nis',
        'kode_generate',
        'minat',
        'kelompok',
        'id_jurusan3',
        'id_jurusan4',
        'sts_bayar',
    ];

    public function masterEvent()
    {
        return $this->belongsTo(MasterEvent::class, 'kd_master_event', 'kd');
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'kd_peserta', 'kd');
    }
}
