<?php

namespace App\Http\Controllers\Api\pesertaevent;

use App\Http\Controllers\Controller;
use App\Models\PesertaEvent;
use App\Http\Resources\PesertaEventResource;
use Illuminate\Support\Facades\Storage;

class DeletePesertaEventController extends Controller
{
    public function __invoke($id)
    {
        $item = PesertaEvent::findOrFail($id);
        Storage::delete('pesertaevents/' . basename($item->image));
        $item->delete();

        return new PesertaEventResource(true, 'PesertaEvent deleted successfully', null);
    }
}
