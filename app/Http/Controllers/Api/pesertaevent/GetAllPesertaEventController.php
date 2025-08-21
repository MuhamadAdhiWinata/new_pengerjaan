<?php

namespace App\Http\Controllers\Api\pesertaevent;

use App\Http\Controllers\Controller;
use App\Models\PesertaEvent;
use App\Http\Resources\PesertaEventResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllPesertaEventController extends Controller
{
    public function __invoke()
    {
        $data = PesertaEvent::orderBy('kd', 'asc')->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new PesertaEventResource(true, 'List of PesertaEvents', $data);
    }
}
