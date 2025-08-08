<?php

namespace App\Http\Controllers\Api\laptop;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use App\Http\Resources\LaptopResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateLaptopController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $item = Laptop::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::delete('laptops/' . basename($item->image));
            $image = $request->file('image');
            $image->storeAs('laptops', $image->hashName());
            $validated['image'] = $image->hashName();
        }

        $item->update($validated);

        return new LaptopResource(true, 'Laptop updated successfully', $item);
    }
}
