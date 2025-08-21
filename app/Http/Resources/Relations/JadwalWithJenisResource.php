<?php

namespace App\Http\Resources\Relations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JadwalWithJenisResource extends JsonResource
{
    public $status;
    public $message;

    public function __construct($status, $message, $resource = null)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
    }

    public function toArray(Request $request): array
    {
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data'    => [
                'kd_ijin'     => $this->kd,
                'kd_jenis'     => $this->kd_jenis,
                'ijin_nama'   => $this->ijin_nama,
                'mulai'       => $this->mulai,
                'selesai'     => $this->selesai,
                'kode'        => $this->jenis->kode ?? null,
                'token_jadwal'=> $this->token_jadwal,
                'jenis'       => $this->jenis->jenis ?? null,
                'waktu'       => $this->jenis->waktu ?? null,
            ],
        ];
    }
}
