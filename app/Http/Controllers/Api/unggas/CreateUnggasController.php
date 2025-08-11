<?php

namespace App\Http\Controllers\Api\unggas;

use App\Http\Controllers\Controller;
use App\Models\Unggas;
use App\Http\Resources\UnggasResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateUnggasController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Unggas::class)
        );

        $data = Unggas::create($validated);

        return new UnggasResource(true, 'Unggas created successfully', $data);
    }
}
