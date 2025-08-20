<?php

namespace App\Http\Controllers\Api\relations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Relations\PesertaEventWithJadwalJenisResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class ShowPesertaEventWithJadwalJenis extends Controller
{
    public function __invoke($kd_peserta, $kd_master_event)
    {
        $data = DB::connection('mysql_fe')
            ->table('at_ijin as i')
            ->join('at_jenis as j', 'i.kd_jenis', '=', 'j.kd')
            ->join('at_peserta_perevent as p', 'i.kd_master_event', '=', 'p.kd_master_event')
            ->where('p.kd_peserta', $kd_peserta)
            ->where('i.kd_master_event', $kd_master_event)
            ->where('p.status_aktif', 1)
            ->select(
                'i.kd as kd_ijin',
                'i.ijin_nama',
                'i.mulai',
                'i.selesai',
                'i.kd_master_event',
                'i.tampil_hasil',
                'i.kd_cabang as prg_event',
                'j.kd as kd_jenis',
                'j.jenis',
                'j.waktu',
                'j.tipe_pengerjaan',
                'j.status_akm',
                'p.kd_peserta'
            )
            ->orderBy('i.mulai', 'asc')
            ->orderBy('i.kd', 'asc')
            ->get();

        if ($data->isEmpty()) {
            throw new ModelNotFoundException('Tidak ada jadwal untuk peserta ini');
        }

        // wrap collection ke Resource
        return PesertaEventWithJadwalJenisResource::collection($data)
            ->additional([
                'success' => true,
                'message' => 'Detail Jadwal + Jenis untuk Peserta',
            ]);
    }
}
