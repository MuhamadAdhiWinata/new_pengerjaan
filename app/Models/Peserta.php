<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterEvent;
use App\Models\PesertaEvent;
use App\Models\Jadwal;

class Peserta extends Model
{
    /** @use HasFactory<\Database\Factories\PesertaFactory> */
    use HasFactory;
    protected $table = 'at_peserta';
    protected $primaryKey = 'kd';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'sandi',
        'nama',
        'alamat',
        'hp',
        'email',
        'wa',
        'tgl_lahir',
        'kd_minat',
        'waktu',
        'sbmptn',
        'status_umum',
        'kd_siswa_umum',
        'sekolah',
        'jk',
        'tempat_lahir',
        'ktp_id',
        'user_id',
    ];

    public function pesertaEvents()
    {
        return $this->hasMany(PesertaEvent::class, 'kd_peserta', 'kd');
    }

    public function events()
    {
        return $this->belongsToMany(
            MasterEvent::class,
            'at_peserta_perevent',
            'kd_peserta',
            'kd_master_event'
        )->withPivot(['status_aktif']);
    }

    public function jadwals()
    {
        return $this->hasManyThrough(
            Jadwal::class,
            PesertaEvent::class,
            'kd_peserta',        // FK di PesertaEvent ke Peserta
            'kd_master_event',   // FK di Jadwal ke master_event
            'kd',                // PK di Peserta
            'kd_master_event'    // PK di PesertaEvent
        );
    }

}
