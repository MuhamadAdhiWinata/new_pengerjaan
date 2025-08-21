<?php

namespace App\Http\Controllers\Api\masterevent;

use App\Http\Controllers\Controller;
use App\Models\MasterEvent;
use App\Http\Resources\MasterEventResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllMasterEventController extends Controller
{
    public function __invoke()
    {
        $data = MasterEvent::orderBy('kd', 'asc')->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new MasterEventResource(true, 'List of MasterEvents', $data);
    }
}
