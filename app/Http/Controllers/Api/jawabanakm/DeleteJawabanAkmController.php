<?php

namespace App\Http\Controllers\Api\jawabanakm;

use App\Http\Controllers\Controller;
use App\Models\JawabanAkm;
use App\Http\Resources\JawabanAkmResource;
use Illuminate\Support\Facades\Storage;

class DeleteJawabanAkmController extends Controller
{
    public function __invoke($id)
    {
        $item = JawabanAkm::findOrFail($id);
        Storage::delete('jawabanakms/' . basename($item->image));
        $item->delete();

        return new JawabanAkmResource(true, 'JawabanAkm deleted successfully', null);
    }
}
