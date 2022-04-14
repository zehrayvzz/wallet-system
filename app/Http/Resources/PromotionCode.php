<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionCode extends JsonResource
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
            'id'         => $this->id,
            'code'       => $this->code,
            'start_date' => $this->start_date,
            'end_date'   => $this->end_date,
            'amount'     => $this->amount,
            'quota'      => $this->quota,
            'users'      => $this->whenLoaded('users', UserResource::collection($this->users), []),
        ];
    }
}
