<?php

namespace App\Http\Controllers\Api\pesawat;

use App\Http\Controllers\Controller;
use App\Models\Pesawat;
use App\Http\Resources\PesawatResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreatePesawatController extends Controller
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
        $image->storeAs('pesawats', $image->hashName());

        $data = Pesawat::create(array_merge($validated, ['image' => $image->hashName()]));

        return new PesawatResource(true, 'Pesawat created successfully', $data);
    }
}
