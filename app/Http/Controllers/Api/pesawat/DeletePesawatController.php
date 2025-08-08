<?php

namespace App\Http\Controllers\Api\pesawat;

use App\Http\Controllers\Controller;
use App\Models\Pesawat;
use App\Http\Resources\PesawatResource;
use Illuminate\Support\Facades\Storage;

class DeletePesawatController extends Controller
{
    public function __invoke($id)
    {
        $item = Pesawat::findOrFail($id);
        Storage::delete('pesawats/' . basename($item->image));
        $item->delete();

        return new PesawatResource(true, 'Pesawat deleted successfully', null);
    }
}
