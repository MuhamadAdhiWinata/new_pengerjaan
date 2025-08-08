<?php

namespace App\Http\Controllers\Api\pengajar;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Http\Resources\PengajarResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreatePengajarController extends Controller
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
        $image->storeAs('pengajars', $image->hashName());

        $data = Pengajar::create(array_merge($validated, ['image' => $image->hashName()]));

        return new PengajarResource(true, 'Pengajar created successfully', $data);
    }
}
