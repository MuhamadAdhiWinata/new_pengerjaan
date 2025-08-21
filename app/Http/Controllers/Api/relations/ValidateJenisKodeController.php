<?php

namespace App\Http\Controllers\Api\relations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Http\Resources\Relations\ValidateJenisKodeResource;

class ValidateJenisKodeController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'kd_jenis' => 'required|integer',
            'kode'     => 'required|string',
        ], [], [
            'kd_jenis' => 'jenis',
            'kode'     => 'kode'
        ]);

        $jenis = Jenis::findOrFail($validated['kd_jenis']);

        if ($jenis->kode === $validated['kode']) {
            return new ValidateJenisKodeResource(true, 'Kode sesuai', [
                'soal_generate' => $jenis->soal_generate,
                'link_embed' => $jenis->link_embed,

            ]);
        }

        return new ValidateJenisKodeResource(false, 'Kode salah');
    }

}
