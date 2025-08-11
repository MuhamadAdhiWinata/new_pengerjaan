<?php

namespace App\Http\Controllers\Api\unggas;

use App\Http\Controllers\Controller;
use App\Models\Unggas;
use App\Http\Resources\UnggasResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllUnggasController extends Controller
{
    public function __invoke()
    {
        $data = Unggas::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new UnggasResource(true, 'List of Unggass', $data);
    }
}
