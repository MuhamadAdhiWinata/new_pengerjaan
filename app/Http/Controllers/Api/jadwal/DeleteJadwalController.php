<?php

namespace App\Http\Controllers\Api\jadwal;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Http\Resources\JadwalResource;
use Illuminate\Support\Facades\Storage;

class DeleteJadwalController extends Controller
{
    public function __invoke($id)
    {
        $item = Jadwal::findOrFail($id);
        Storage::delete('jadwals/' . basename($item->image));
        $item->delete();

        return new JadwalResource(true, 'Jadwal deleted successfully', null);
    }
}
