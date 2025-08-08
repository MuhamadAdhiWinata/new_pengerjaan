<?php

namespace App\Http\Controllers\Api\laptop;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use App\Http\Resources\LaptopResource;
use Illuminate\Support\Facades\Storage;

class DeleteLaptopController extends Controller
{
    public function __invoke($id)
    {
        $item = Laptop::findOrFail($id);
        Storage::delete('laptops/' . basename($item->image));
        $item->delete();

        return new LaptopResource(true, 'Laptop deleted successfully', null);
    }
}
