<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray($request)
    {
        $response = [
            'date' => $this->created_at,
            'value' => $this->getAmountFormatAttribute(),
            'user' => new UserResource($this->payeeUser),
        ];

        return $response;
    }
}
