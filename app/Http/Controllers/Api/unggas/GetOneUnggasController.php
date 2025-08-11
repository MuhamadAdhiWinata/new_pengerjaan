<?php

namespace App\Http\Controllers\Api\unggas;

use App\Http\Controllers\Controller;
use App\Models\Unggas;
use App\Http\Resources\UnggasResource;

class GetOneUnggasController extends Controller
{
    public function __invoke($id)
    {
        $data = Unggas::findOrFail($id);

        return new UnggasResource(true, 'Unggas fetched successfully', $data);
    }
}
