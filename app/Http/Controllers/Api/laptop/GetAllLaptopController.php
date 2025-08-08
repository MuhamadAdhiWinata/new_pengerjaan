<?php

namespace App\Http\Controllers\Api\laptop;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use App\Http\Resources\LaptopResource;

class GetAllLaptopController extends Controller
{
    public function __invoke()
    {
        $data = Laptop::latest()->paginate(5);
        return new LaptopResource(true, 'List of Laptops', $data);
    }
}
