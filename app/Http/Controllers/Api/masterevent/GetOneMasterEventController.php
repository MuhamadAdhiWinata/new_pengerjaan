<?php

namespace App\Http\Controllers\Api\masterevent;

use App\Http\Controllers\Controller;
use App\Models\MasterEvent;
use App\Http\Resources\MasterEventResource;

class GetOneMasterEventController extends Controller
{
    public function __invoke($id)
    {
        $data = MasterEvent::findOrFail($id);

        return new MasterEventResource(true, 'MasterEvent fetched successfully', $data);
    }
}
