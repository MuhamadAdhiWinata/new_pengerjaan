<?php

namespace App\Http\Controllers\Api\botol;

use App\Http\Controllers\Controller;
use App\Models\Botol;
use App\Http\Resources\BotolResource;

class GetOneBotolController extends Controller
{
    public function __invoke($id)
    {
        $data = Botol::findOrFail($id);

        return new BotolResource(true, 'Botol fetched successfully', $data);
    }
}
