<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class userTokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'token' => $this->token,
            'role' => $this->role,
        ];
    }
}
