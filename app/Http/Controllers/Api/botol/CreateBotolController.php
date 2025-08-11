<?php

namespace App\Http\Controllers\Api\botol;

use App\Http\Controllers\Controller;
use App\Models\Botol;
use App\Http\Resources\BotolResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateBotolController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Botol::class)
        );

        $data = Botol::create($validated);

        return new BotolResource(true, 'Botol created successfully', $data);
    }
}
