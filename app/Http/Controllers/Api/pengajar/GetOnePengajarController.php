<?php

namespace App\Http\Controllers\Api\pengajar;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Http\Resources\PengajarResource;

class GetOnePengajarController extends Controller
{
    public function __invoke($id)
    {
        $data = Pengajar::findOrFail($id);

        return new PengajarResource(true, 'Pengajar fetched successfully', $data);
    }
}
