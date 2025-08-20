<?php

namespace App\Http\Controllers\Api\jenis;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Http\Resources\JenisResource;
use Illuminate\Support\Facades\Storage;

class DeleteJenisController extends Controller
{
    public function __invoke($id)
    {
        $item = Jenis::findOrFail($id);
        Storage::delete('jeniss/' . basename($item->image));
        $item->delete();

        return new JenisResource(true, 'Jenis deleted successfully', null);
    }
}
