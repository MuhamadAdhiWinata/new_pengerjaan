<?php

namespace App\Http\Controllers\Api\masterevent;

use App\Http\Controllers\Controller;
use App\Models\MasterEvent;
use App\Http\Resources\MasterEventResource;
use Illuminate\Support\Facades\Storage;

class DeleteMasterEventController extends Controller
{
    public function __invoke($id)
    {
        $item = MasterEvent::findOrFail($id);
        Storage::delete('masterevents/' . basename($item->image));
        $item->delete();

        return new MasterEventResource(true, 'MasterEvent deleted successfully', null);
    }
}
