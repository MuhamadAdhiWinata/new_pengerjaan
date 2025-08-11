<?php

namespace App\Http\Controllers\Api\botol;

use App\Http\Controllers\Controller;
use App\Models\Botol;
use App\Http\Resources\BotolResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllBotolController extends Controller
{
    public function __invoke()
    {
        $data = Botol::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new BotolResource(true, 'List of Botols', $data);
    }
}
