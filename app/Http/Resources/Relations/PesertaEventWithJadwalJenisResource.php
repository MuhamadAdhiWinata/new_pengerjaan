<?php

namespace App\Http\Resources\Relations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PesertaEventWithJadwalJenisResource extends JsonResource
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
                'kd'       => $this->kd,
                'username' => $this->username,
                'nama'     => $this->nama,
                'email'    => $this->email,
                'hp'       => $this->hp,
                'jadwals' => $this->jadwals->map(function ($jadwal) {
                    return [
                        'kd_ijin'        => $jadwal->kd_ijin,
                        'ijin_nama'      => $jadwal->ijin_nama,
                        'mulai'          => $jadwal->mulai,
                        'selesai'        => $jadwal->selesai,
                        'kd_master_event'=> $jadwal->kd_master_event,
                        'tampil_hasil'   => $jadwal->tampil_hasil,
                        'prg_event'      => $jadwal->prg_event,
                        'kd_jenis'       => $jadwal->kd_jenis,
                        'jenis'          => $jadwal->jenis,
                        'waktu'          => $jadwal->waktu,
                        'tipe_pengerjaan'=> $jadwal->tipe_pengerjaan,
                        'status_akm'     => $jadwal->status_akm,
                        'kd_peserta'     => $jadwal->kd_peserta
                    ];
                }),
            ]
        ];
    }
}
