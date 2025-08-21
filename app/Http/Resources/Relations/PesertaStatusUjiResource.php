<?php

namespace App\Http\Resources\Relations;

use Illuminate\Http\Resources\Json\JsonResource;

class PesertaStatusUjiResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'status' => $this->status,
            'jawaban' => [
                'kd'                => $this->jawaban->kd ?? null,
                'kd_peserta'        => $this->jawaban->kd_peserta ?? null,
                'kd_ijin'           => $this->jawaban->kd_ijin ?? null,
                'kd_jenis'          => $this->jawaban->kd_jenis ?? null,
                'waktu'             => $this->jawaban->waktu ?? null,
                'sisa'              => $this->jawaban->sisa ?? null,
                'kd_materi'         => $this->jawaban->kd_materi ?? null,
                'soal_didapat'      => $this->jawaban->soal_didapat ?? null,
                'soal_dikerjakan'   => $this->jawaban->soal_dikerjakan ?? null,
                'waktu_mulai'       => $this->jawaban->waktu_mulai ?? null,
                'waktu_selesai'     => $this->jawaban->waktu_selesai ?? null,
                'status_mengerjakan'=> $this->jawaban->status_mengerjakan ?? null,
                'status_reset'      => $this->jawaban->status_reset ?? null,
                'upload'            => $this->jawaban->upload ?? null,
            ],
        ];
    }
}
