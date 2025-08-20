<?php

namespace App\Http\Controllers\Api\peserta;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Http\Resources\PesertaResource;
use Illuminate\Support\Facades\Storage;

class DeletePesertaController extends Controller
{
    public function __invoke($id)
    {
        $item = Peserta::findOrFail($id);
        Storage::delete('pesertas/' . basename($item->image));
        $item->delete();

        return new PesertaResource(true, 'Peserta deleted successfully', null);
    }
}
