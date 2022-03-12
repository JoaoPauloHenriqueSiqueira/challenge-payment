<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MyWalletResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'token' => $this->uuid,
            'balance' => $this->getAmountFormatAttribute(),
            'received_history' => TransactionResource::collection($this->user->received),
            'payment_history' => TransactionResource::collection($this->user->payments)
        ];
    }
}
