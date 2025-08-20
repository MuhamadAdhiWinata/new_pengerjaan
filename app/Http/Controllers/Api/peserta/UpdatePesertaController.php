<?php

namespace App\Http\Controllers\Api\peserta;

use App\Helpers\ValidationHelper;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Http\Resources\PesertaResource;
use Illuminate\Http\Request;

class UpdatePesertaController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate(
            ValidationHelper::updateRulesFromModel(Peserta::class)
        );

        $item = Peserta::findOrFail($id);

        $item->update($validated);

        return new PesertaResource(true, 'Peserta updated successfully', $item);
    }
}
