<?php

namespace App\Http\Controllers\Api\laptop;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use App\Http\Resources\LaptopResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreateLaptopController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $image = $request->file('image');
        $image->storeAs('laptops', $image->hashName());

        $data = Laptop::create(array_merge($validated, ['image' => $image->hashName()]));

        return new LaptopResource(true, 'Laptop created successfully', $data);
    }
}
