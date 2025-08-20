<?php

namespace App\Http\Controllers\Api\peserta;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Http\Resources\PesertaResource;

class GetOnePesertaController extends Controller
{
    public function __invoke($id)
    {
        $data = Peserta::findOrFail($id);

        return new PesertaResource(true, 'Peserta fetched successfully', $data);
    }
}
