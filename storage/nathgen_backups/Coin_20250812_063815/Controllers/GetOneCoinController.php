<?php

namespace App\Http\Controllers\Api\coin;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Http\Resources\CoinResource;

class GetOneCoinController extends Controller
{
    public function __invoke($id)
    {
        $data = Coin::findOrFail($id);

        return new CoinResource(true, 'Coin fetched successfully', $data);
    }
}
