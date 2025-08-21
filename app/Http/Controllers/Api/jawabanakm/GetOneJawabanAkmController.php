<?php

namespace App\Http\Controllers\Api\jawabanakm;

use App\Http\Controllers\Controller;
use App\Models\JawabanAkm;
use App\Http\Resources\JawabanAkmResource;

class GetOneJawabanAkmController extends Controller
{
    public function __invoke($id)
    {
        $data = JawabanAkm::findOrFail($id);

        return new JawabanAkmResource(true, 'JawabanAkm fetched successfully', $data);
    }
}
