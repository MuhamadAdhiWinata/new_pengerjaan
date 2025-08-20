<?php

namespace App\Http\Controllers\Api\jadwal;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Http\Resources\JadwalResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreateJadwalController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Jadwal::class)
        );

        $data = Jadwal::create($validated);

        return new JadwalResource(true, 'Jadwal created successfully', $data);
    }
}
