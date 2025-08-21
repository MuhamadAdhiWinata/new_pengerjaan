<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PesertaEvent;


class Jadwal extends Model
{
    protected $connection = 'mysql_fe';   // DB kedua
    protected $table = 'at_ijin';
    protected $primaryKey = 'kd';
    public $timestamps = false;

    protected $fillable = [
        'kd',
        'kd_jenis',
        'kd_cabang',
        'kd_tapel',
        'kd_kelas',
        'mulai',
        'selesai',
        'member_username',
        'ijin_nama',
        'kd_tipe',
        'tgl_hasil',
        'kd_master_event',
        'auto_koreksi',
        'nama_event',
        'tampil_hasil',
        'status_hapus',
        'status_migrasi_token',
        'token_jadwal',
        'status_jurusan',
        'status_jurusan2',
        'status_nilai_pm',
        'tgl_pelaksanaan',
        'tgl_selesai',
        'mulai_2',
        'selesai_2',
        'mulai_3',
        'selesai_3',
        'check_jurusan',
        'mulai_4',
        'selesai_4',
        'kd_bridging',
        'content_bridging',
        'id_promo',
        'opsi_jurusan',
        'status_jurusan3',
        'status_jurusan4',
        'list_wilayah',
        'config_db',
        'b_two_c',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'kd_jenis', 'kd');
    }

    public function pesertaPerevent()
    {
        return $this->hasMany(PesertaEvent::class, 'kd_master_event', 'kd_master_event');
    }
}
