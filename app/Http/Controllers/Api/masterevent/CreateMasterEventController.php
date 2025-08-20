<?php

namespace App\Http\Controllers\Api\masterevent;

use App\Http\Controllers\Controller;
use App\Models\MasterEvent;
use App\Http\Resources\MasterEventResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateMasterEventController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(MasterEvent::class)
        );

        $data = MasterEvent::create($validated);

        return new MasterEventResource(true, 'MasterEvent created successfully', $data);
    }
}
