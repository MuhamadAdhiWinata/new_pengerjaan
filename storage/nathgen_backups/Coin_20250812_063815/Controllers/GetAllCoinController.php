<?php

namespace App\Http\Controllers\Api\coin;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Http\Resources\CoinResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetAllCoinController extends Controller
{
    public function __invoke()
    {
        $data = Coin::latest()->paginate(10);
        if ($data->isEmpty()) {
            throw new ModelNotFoundException();
        }
        return new CoinResource(true, 'List of Coins', $data);
    }
}
