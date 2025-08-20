<?php

namespace App\Http\Controllers\Api\pesertaevent;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\PesertaEvent;
use App\Http\Resources\PesertaEventResource;
use Illuminate\Http\Request;

class UpdatePesertaEventController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(PesertaEvent::class)
        );

        $item = PesertaEvent::findOrFail($id);

        $item->update($validated);

        return new PesertaEventResource(true, 'PesertaEvent updated successfully', $item);
    }
}
