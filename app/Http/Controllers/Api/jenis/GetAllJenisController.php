<?php

namespace App\Http\Controllers\Api\jenis;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Http\Resources\JenisResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllJenisController extends Controller
{
    public function __invoke()
    {
        $data = Jenis::orderBy('kd', 'asc')->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new JenisResource(true, 'List of Jeniss', $data);
    }
}
