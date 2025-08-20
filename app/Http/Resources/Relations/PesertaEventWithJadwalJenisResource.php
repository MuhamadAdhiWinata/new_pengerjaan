<?php

namespace App\Http\Resources\Relations;

use Illuminate\Http\Resources\Json\JsonResource;

class PesertaEventWithJadwalJenisResource extends JsonResource
{
    public $status;
    public $message;

    public function __construct($status = true, $message = '', $resource = null)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
    }

    public function toArray($request)
    {
        return [
            'kd_ijin'         => $this->kd_ijin,
            'ijin_nama'       => $this->ijin_nama,
            'mulai'           => $this->mulai,
            'selesai'         => $this->selesai,
            'kd_master_event' => $this->kd_master_event,
            'tampil_hasil'    => $this->tampil_hasil,
            'prg_event'       => $this->prg_event,
            'kd_jenis'        => $this->kd_jenis,
            'jenis'           => $this->jenis,
            'waktu'           => $this->waktu,
            'tipe_pengerjaan' => $this->tipe_pengerjaan,
            'status_akm'      => $this->status_akm,
            'kd_peserta'      => $this->kd_peserta,
        ];
    }

    public function with($request)
    {
        return [
            'success' => $this->status,
            'message' => $this->message,
        ];
    }
}
