<?php

namespace App\Http\Controllers\Api\unggas;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Unggas;
use App\Http\Resources\UnggasResource;
use Illuminate\Http\Request;

class UpdateUnggasController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Unggas::class)
        );

        $item = Unggas::findOrFail($id);

        $item->update($validated);

        return new UnggasResource(true, 'Unggas updated successfully', $item);
    }
}
