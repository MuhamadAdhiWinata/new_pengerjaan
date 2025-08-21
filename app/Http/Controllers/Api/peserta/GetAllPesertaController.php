<?php

namespace App\Http\Controllers\Api\peserta;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Http\Resources\PesertaResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllPesertaController extends Controller
{
    public function __invoke()
    {
        $data = Peserta::orderBy('kd', 'asc')->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new PesertaResource(true, 'List of Pesertas', $data);
    }
}
