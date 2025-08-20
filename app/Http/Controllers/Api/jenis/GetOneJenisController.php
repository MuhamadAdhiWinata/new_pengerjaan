<?php

namespace App\Http\Controllers\Api\jenis;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Http\Resources\JenisResource;

class GetOneJenisController extends Controller
{
    public function __invoke($id)
    {
        $data = Jenis::findOrFail($id);

        return new JenisResource(true, 'Jenis fetched successfully', $data);
    }
}
