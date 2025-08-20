<?php

namespace App\Http\Resources\Relations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PesertaWithEventsResource extends JsonResource
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
                'events' => $this->events->map(function ($event) {
                    return [
                        'kd'              => $event->kd,
                        'nama_event'      => $event->nama_event,
                        'tgl_pelaksanaan' => $event->tgl_pelaksanaan,
                        'status_aktif'    => $event->event_status_aktif,
                        'status_peserta'  => $event->pivot->status_aktif,
                    ];
                }),
            ]
        ];
    }
}
