<?php

namespace App\Http\Controllers\Api\coin;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Http\Resources\CoinResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateCoinController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Coin::class)
        );

        $data = Coin::create($validated);

        return new CoinResource(true, 'Coin created successfully', $data);
    }
}
