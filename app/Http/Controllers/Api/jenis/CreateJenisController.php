<?php

namespace App\Http\Controllers\Api\jenis;

use App\Http\Controllers\Controller;
use App\Models\Jenis;
use App\Http\Resources\JenisResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateJenisController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Jenis::class)
        );

        $data = Jenis::create($validated);

        return new JenisResource(true, 'Jenis created successfully', $data);
    }
}
