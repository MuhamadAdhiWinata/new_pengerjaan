<?php

namespace App\Http\Controllers\Api\coin;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Http\Resources\CoinResource;
use Illuminate\Support\Facades\Storage;

class DeleteCoinController extends Controller
{
    public function __invoke($id)
    {
        $item = Coin::findOrFail($id);
        Storage::delete('coins/' . basename($item->image));
        $item->delete();

        return new CoinResource(true, 'Coin deleted successfully', null);
    }
}
