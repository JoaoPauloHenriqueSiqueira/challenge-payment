<?php

namespace App\Http\Resources;

use App\Helpers\Format;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' =>  $this->email,
            'cpf' => app(Format::class)->mask($this->cpf, "***.#######-**"),
            'wallet' => new WalletResource($this->wallet)
        ];
    }
}
