<?php

namespace App\Http\Controllers\Api\peserta;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Http\Resources\PesertaResource;
use Illuminate\Http\Request;
use App\Helpers\ValidationHelper;

class CreatePesertaController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate(
            ValidationHelper::rulesFromModel(Peserta::class)
        );

        $data = Peserta::create($validated);

        return new PesertaResource(true, 'Peserta created successfully', $data);
    }
}
