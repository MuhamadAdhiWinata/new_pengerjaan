<?php

namespace App\Http\Controllers\Api\jawabanakm;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\JawabanAkm;
use App\Http\Resources\JawabanAkmResource;
use Illuminate\Http\Request;

class UpdateJawabanAkmController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(JawabanAkm::class)
        );

        $item = JawabanAkm::findOrFail($id);

        $item->update($validated);

        return new JawabanAkmResource(true, 'JawabanAkm updated successfully', $item);
    }
}
