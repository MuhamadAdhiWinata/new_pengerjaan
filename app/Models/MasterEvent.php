<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterEvent extends Model
{
    /** @use HasFactory<\Database\Factories\MasterEventFactory> */
    use HasFactory;

    protected $table = 'at_master_event';
    protected $primaryKey = 'kd';
    public $timestamps = false;

    protected $fillable = [
        'nama_event',
        'kd_kategori_jadwal',
        'harga_brosur',
        'harga_asli',
        'status_bonus',
        'status_aktif',
        'foto',
        'berbintang',
        'kerjasama_sekolah',
        'kd_tapel',
        'kd_kelas',
        'kd_tipe',
        'kd_cabang',
        'masa_aktif',
        'status_email',
        'status_tgl_lahir',
        'status_kota',
        'status_kelas',
        'status_nama_ortu',
        'status_wa_ortu',
        'status_jurusan',
        'status_jurusan2',
        'tgl_pelaksanaan',
        'status_tampil_hasil',
        'link_hasil_global',
        'nama_pic',
        'nomor_pic',
        'note',
        'status_alamat',
        'kode_unik',
        'kode_unik_admin',
        'status_trial',
        'status_hak_akses_cabang',
        'id_config_utama',
        'kode_generate',
        'status_minat',
        'status_perkota_persekolah',
        'id_kota',
        'id_sekolah',
        'id_jenjang',
        'mulai_kelola',
        'selesai_kelola',
        'kode_cabang_pelaksana',
        'status_nilai_pm',
        'check_token',
        'tgl_selesai',
        'check_jurusan',
        'check_sesi',
        'tagihan',
        'status_opsi',
        'in_ex',
        'status_btn_jawaban',
        'content_bridging',
        'kd_bridging',
        'id_promo',
        'status_jurusan3',
        'status_jurusan4',
        'opsi_jurusan',
        'input_dinamis',
        'config_db',
        'qris_id',
        'created_at',
        'updated_at',
        'check_import_protor',
        'b_two_c',
    ];

    public function pesertaEvents()
    {
        return $this->hasMany(PesertaEvent::class, 'kd_master_event', 'kd');
    }

    public function jadwals()
    {
        return $this->setConnection('mysql_fe')
                    ->hasMany(Jadwal::class, 'kd_master_event', 'kd');
    }

}
