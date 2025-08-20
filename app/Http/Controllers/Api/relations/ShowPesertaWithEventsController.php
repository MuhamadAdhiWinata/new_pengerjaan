<?php

namespace App\Http\Controllers\Api\relations;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Http\Resources\Relations\PesertaWithEventsResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShowPesertaWithEventsController extends Controller
{
    public function __invoke($id)
    {
        $peserta = Peserta::with(['events' => function ($q) {
            $q->select(
                'at_master_event.kd',
                'at_master_event.nama_event',
                'at_master_event.tgl_pelaksanaan',
                'at_master_event.status_aktif as event_status_aktif'
            );
        }])->find($id);


        if (!$peserta) {
            throw new ModelNotFoundException();
        }

        return new PesertaWithEventsResource(true, 'Detail Peserta with Events', $peserta);
    }
}
