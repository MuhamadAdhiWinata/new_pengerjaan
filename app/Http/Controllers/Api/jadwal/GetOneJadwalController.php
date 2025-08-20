<?php

namespace App\Http\Controllers\Api\jadwal;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Http\Resources\JadwalResource;

class GetOneJadwalController extends Controller
{
    public function __invoke($id)
    {
        $data = Jadwal::findOrFail($id);

        return new JadwalResource(true, 'Jadwal fetched successfully', $data);
    }
}
