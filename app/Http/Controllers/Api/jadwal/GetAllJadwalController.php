<?php

namespace App\Http\Controllers\Api\jadwal;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Http\Resources\JadwalResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllJadwalController extends Controller
{
    public function __invoke()
    {
        $data = Jadwal::orderBy('kd', 'asc')->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new JadwalResource(true, 'List of Jadwals', $data);
    }
}
