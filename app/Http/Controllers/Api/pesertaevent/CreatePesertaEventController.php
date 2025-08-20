<?php

namespace App\Http\Controllers\Api\pesertaevent;

use App\Http\Controllers\Controller;
use App\Models\PesertaEvent;
use App\Http\Resources\PesertaEventResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreatePesertaEventController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(PesertaEvent::class)
        );

        $data = PesertaEvent::create($validated);

        return new PesertaEventResource(true, 'PesertaEvent created successfully', $data);
    }
}
