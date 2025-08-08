<?php

namespace App\Http\Controllers\Api\pengajar;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Http\Resources\PengajarResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllPengajarController extends Controller
{
    public function __invoke()
    {
        $data = Pengajar::latest()->paginate(5);

        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        
        return new PengajarResource(true, 'List of Pengajars', $data);
    }
}
