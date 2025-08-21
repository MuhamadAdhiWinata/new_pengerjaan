<?php

namespace App\Http\Controllers\Api\relations;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Http\Resources\Relations\PesertaEventWithJadwalJenisResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShowPesertaEventWithJadwalJenis extends Controller
{
    public function __invoke($id_peserta, $kd_master_event)
    {
        $peserta = Peserta::with(['jadwals' => function($q) use($kd_master_event) {
            $q->where('at_ijin.kd_master_event', $kd_master_event)
            ->join('at_jenis', 'at_ijin.kd_jenis', '=', 'at_jenis.kd')
            ->select(
                'at_ijin.kd as kd_ijin',
                'at_ijin.ijin_nama',
                'at_ijin.mulai',
                'at_ijin.selesai',
                'at_ijin.kd_master_event',
                'at_ijin.tampil_hasil',
                'at_ijin.kd_cabang as prg_event',
                'at_jenis.kd as kd_jenis',
                'at_jenis.jenis',
                'at_jenis.waktu',
                'at_jenis.tipe_pengerjaan',
                'at_jenis.status_akm',
                'at_peserta_perevent.kd_peserta'
            );
        }])->find($id_peserta);

        if (!$peserta || $peserta->jadwals->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada jadwal untuk peserta ini',
                'data'    => []
            ]);
        }

        return new PesertaEventWithJadwalJenisResource(true, 'Detail Peserta dengan Jadwal & Jenis', $peserta);
    }
}
