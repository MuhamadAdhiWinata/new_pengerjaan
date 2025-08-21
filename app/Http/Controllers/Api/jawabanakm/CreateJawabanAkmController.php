<?php

namespace App\Http\Controllers\Api\jawabanakm;

use App\Http\Controllers\Controller;
use App\Models\JawabanAkm;
use App\Http\Resources\JawabanAkmResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateJawabanAkmController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(JawabanAkm::class)
        );

        $data = JawabanAkm::create($validated);

        return new JawabanAkmResource(true, 'JawabanAkm created successfully', $data);
    }
}
