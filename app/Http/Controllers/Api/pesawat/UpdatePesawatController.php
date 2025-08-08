<?php

namespace App\Http\Controllers\Api\pesawat;

use App\Http\Controllers\Controller;
use App\Models\Pesawat;
use App\Http\Resources\PesawatResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdatePesawatController extends Controller
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

        $item = Pesawat::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::delete('pesawats/' . basename($item->image));
            $image = $request->file('image');
            $image->storeAs('pesawats', $image->hashName());
            $validated['image'] = $image->hashName();
        }

        $item->update($validated);

        return new PesawatResource(true, 'Pesawat updated successfully', $item);
    }
}
