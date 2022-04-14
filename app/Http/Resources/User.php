<?php

namespace App\Http\Resources;

use App\Http\Resources\Wallet as WalletResource;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'id'           => $this->id,
            'user_name'    => $this->user_name,
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'email'        => $this->email,
            'wallet'       => new WalletResource($this->wallet),
        ];
    }
}
