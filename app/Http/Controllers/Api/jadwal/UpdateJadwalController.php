<?php

namespace App\Http\Controllers\Api\jadwal;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Http\Resources\JadwalResource;
use Illuminate\Http\Request;

class UpdateJadwalController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Jadwal::class)
        );

        $item = Jadwal::findOrFail($id);

        $item->update($validated);

        return new JadwalResource(true, 'Jadwal updated successfully', $item);
    }
}
