<?php

namespace App\Http\Controllers\Api\pesawat;

use App\Http\Controllers\Controller;
use App\Models\Pesawat;
use App\Http\Resources\PesawatResource;

class GetAllPesawatController extends Controller
{
    public function __invoke()
    {
        $data = Pesawat::latest()->paginate(5);
        return new PesawatResource(true, 'List of Pesawats', $data);
    }
}
