<?php

namespace App\Http\Resources\Relations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ValidateJenisKodeResource extends JsonResource
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
            'data'    => $this->resource,
        ];
    }
}
