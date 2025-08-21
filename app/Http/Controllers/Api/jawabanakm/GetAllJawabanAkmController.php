<?php

namespace App\Http\Controllers\Api\jawabanakm;

use App\Http\Controllers\Controller;
use App\Models\JawabanAkm;
use App\Http\Resources\JawabanAkmResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllJawabanAkmController extends Controller
{
    public function __invoke()
    {
        $data = JawabanAkm::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new JawabanAkmResource(true, 'List of JawabanAkms', $data);
    }
}
