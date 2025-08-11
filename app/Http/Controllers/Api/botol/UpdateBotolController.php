<?php

namespace App\Http\Controllers\Api\botol;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Botol;
use App\Http\Resources\BotolResource;
use Illuminate\Http\Request;

class UpdateBotolController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Botol::class)
        );

        $item = Botol::findOrFail($id);

        $item->update($validated);

        return new BotolResource(true, 'Botol updated successfully', $item);
    }
}
