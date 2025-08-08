<?php

namespace App\Http\Controllers\Api\pesawat;

use App\Http\Controllers\Controller;
use App\Models\Pesawat;
use App\Http\Resources\PesawatResource;

class GetOnePesawatController extends Controller
{
    public function __invoke($id)
    {
        $data = Pesawat::findOrFail($id);

        return new PesawatResource(true, 'Pesawat fetched successfully', $data);
    }
}
