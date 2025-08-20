<?php

namespace App\Http\Controllers\Api\pesertaevent;

use App\Http\Controllers\Controller;
use App\Models\PesertaEvent;
use App\Http\Resources\PesertaEventResource;

class GetOnePesertaEventController extends Controller
{
    public function __invoke($id)
    {
        $data = PesertaEvent::findOrFail($id);

        return new PesertaEventResource(true, 'PesertaEvent fetched successfully', $data);
    }
}
