<?php

namespace App\Http\Controllers\Api\coin;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Http\Resources\CoinResource;
use Illuminate\Http\Request;

class UpdateCoinController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Coin::class)
        );

        $item = Coin::findOrFail($id);

        $item->update($validated);

        return new CoinResource(true, 'Coin updated successfully', $item);
    }
}
