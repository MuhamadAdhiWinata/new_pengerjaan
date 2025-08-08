<?php

namespace App\Http\Controllers\Api\pengajar;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Http\Resources\PengajarResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdatePengajarController extends Controller
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

        $item = Pengajar::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::delete('pengajars/' . basename($item->image));
            $image = $request->file('image');
            $image->storeAs('pengajars', $image->hashName());
            $validated['image'] = $image->hashName();
        }

        $item->update($validated);

        return new PengajarResource(true, 'Pengajar updated successfully', $item);
    }
}
