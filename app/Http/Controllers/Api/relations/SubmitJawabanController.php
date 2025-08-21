<?php

namespace App\Http\Controllers\Api\relations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Relations\SubmitJawabanResource;
use App\Models\JawabanAkm;
use Illuminate\Http\Request;

class SubmitJawabanController extends Controller
{
    public function __invoke(Request $request, $kd)
    {
        $request->validate([
            'jawaban' => 'required|array', // FE wajib kirim array JSON
        ]);

        $json_jawaban   = json_encode($request->jawaban, JSON_UNESCAPED_UNICODE);
        $waktu_sekarang = now();

        $jawaban = JawabanAkm::where('kd', $kd)->firstOrFail();
        $jawaban->update([
            'jawaban'            => $json_jawaban,
            'waktu_selesai'      => $waktu_sekarang,
            'status_mengerjakan' => 0,
        ]);

        return new SubmitJawabanResource(true, 'Jawaban berhasil disubmit', $jawaban);
    }
}
