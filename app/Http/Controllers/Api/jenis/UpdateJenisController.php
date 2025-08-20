<?php

namespace App\Http\Controllers\Api\jenis;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Http\Resources\JenisResource;
use Illuminate\Http\Request;

class UpdateJenisController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Jenis::class)
        );

        $item = Jenis::findOrFail($id);

        $item->update($validated);

        return new JenisResource(true, 'Jenis updated successfully', $item);
    }
}
