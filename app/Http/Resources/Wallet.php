<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class Wallet extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'balance'     => $this->balance,
            'updated_at'  => $this->created_at->format('Y.m.d H:i'),

        ];
    }
}
