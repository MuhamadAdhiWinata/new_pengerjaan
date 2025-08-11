<?php

namespace App\Http\Controllers\Api\botol;

use App\Http\Controllers\Controller;
use App\Models\Botol;
use App\Http\Resources\BotolResource;
use Illuminate\Support\Facades\Storage;

class DeleteBotolController extends Controller
{
    public function __invoke($id)
    {
        $item = Botol::findOrFail($id);
        Storage::delete('botols/' . basename($item->image));
        $item->delete();

        return new BotolResource(true, 'Botol deleted successfully', null);
    }
}
