<?php

namespace App\Http\Controllers\Api\pengajar;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Http\Resources\PengajarResource;
use Illuminate\Support\Facades\Storage;

class DeletePengajarController extends Controller
{
    public function __invoke($id)
    {
        $item = Pengajar::findOrFail($id);
        Storage::delete('pengajars/' . basename($item->image));
        $item->delete();

        return new PengajarResource(true, 'Pengajar deleted successfully', null);
    }
}
