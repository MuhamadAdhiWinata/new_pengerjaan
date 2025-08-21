<?php

namespace App\Http\Controllers\Api\relations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Relations\PesertaStatusUjiResource;
use App\Models\JawabanAkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowPesertaStatusUjiController extends Controller
{
    public function __invoke(Request $request, $kd_peserta)
    {
        $request->validate([
            'kd_ijin'  => 'required|integer',
            'kd_jenis' => 'required|integer',
        ]);

        $kd_ijin  = $request->query('kd_ijin');
        $kd_jenis = $request->query('kd_jenis');

        $jenis = DB::table('at_jenis')
            ->select('waktu', 'soal_generate')
            ->where('kd', $kd_jenis)
            ->first();

        $durasi = (int) ($jenis->waktu ?? 0);
        $soal_didapat = 0;
        if ($jenis && $jenis->soal_generate) {
            $totalSoal = json_decode($jenis->soal_generate, true);
            $soal_didapat = is_array($totalSoal) ? count($totalSoal) : 0;
        }

        $jawaban = JawabanAkm::where('kd_peserta', $kd_peserta)
            ->where('kd_ijin', $kd_ijin)
            ->where('kd_jenis', $kd_jenis)
            ->first();

        $status = null;

        if (!$jawaban) {
            $status = 'mulai';
            $jawaban = JawabanAkm::create([
                'kd_peserta'         => $kd_peserta,
                'kd_ijin'            => $kd_ijin,
                'kd_jenis'           => $kd_jenis,
                'status_mengerjakan' => 1,
                'waktu_mulai'        => now(),
                'soal_didapat'       => $soal_didapat,
                'soal_dikerjakan'    => 0,
                'waktu'              => $durasi,
                'sisa'               => $durasi,
            ]);
        } elseif ($jawaban->status_mengerjakan == 0) {
            $status = 'selesai';
        } elseif ($jawaban->waktu_mulai && !$jawaban->waktu_selesai) {
            $status = 'lanjut';

            // cek expired
            $selisih = now()->diffInSeconds($jawaban->waktu_mulai);
            if ($jawaban->waktu && $selisih > $jawaban->waktu) {
                $status = 'expired';
            }
        }

        $responseData = (object) [
            'status'  => $status,
            'jawaban' => $jawaban
        ];

        return response()->json([
            'success' => true,
            'message' => 'Status peserta ujian',
            'data'    => new PesertaStatusUjiResource($responseData),
        ]);
    }
}
