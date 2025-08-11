<?php

namespace App\Http\Controllers\Api\unggas;

use App\Http\Controllers\Controller;
use App\Models\Unggas;
use App\Http\Resources\UnggasResource;
use Illuminate\Support\Facades\Storage;

class DeleteUnggasController extends Controller
{
    public function __invoke($id)
    {
        $item = Unggas::findOrFail($id);
        Storage::delete('unggass/' . basename($item->image));
        $item->delete();

        return new UnggasResource(true, 'Unggas deleted successfully', null);
    }
}
