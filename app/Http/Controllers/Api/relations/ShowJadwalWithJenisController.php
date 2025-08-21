<?php

namespace App\Http\Controllers\Api\relations;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Http\Resources\Relations\JadwalWithJenisResource;

class ShowJadwalWithJenisController extends Controller
{
    public function __invoke($kd_ijin)
    {
        // Load jadwal beserta relasi jenis
        $jadwal = Jadwal::with('jenis')->find($kd_ijin);

        if (!$jadwal) {
            return new JadwalWithJenisResource(false, 'Jadwal tidak ditemukan');
        }

        return new JadwalWithJenisResource(true, 'Jadwal fetched successfully', $jadwal);
    }
}
