<?php

namespace App\Http\Controllers\Api\masterevent;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\MasterEvent;
use App\Http\Resources\MasterEventResource;
use Illuminate\Http\Request;

class UpdateMasterEventController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(MasterEvent::class)
        );

        $item = MasterEvent::findOrFail($id);

        $item->update($validated);

        return new MasterEventResource(true, 'MasterEvent updated successfully', $item);
    }
}
