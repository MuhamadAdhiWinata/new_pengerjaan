<?php

namespace App\Http\Controllers\Api\laptop;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use App\Http\Resources\LaptopResource;

class GetOneLaptopController extends Controller
{
    public function __invoke($id)
    {
        $data = Laptop::findOrFail($id);

        return new LaptopResource(true, 'Laptop fetched successfully', $data);
    }
}
