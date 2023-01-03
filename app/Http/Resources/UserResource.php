<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'cmpname' => $this->cmpname,
            'types' => $this->types,
            'email' => $this->email,
            'remember_token' => $this->remember_token,
            'verify_pin'   => $this->verify_pin,
            'address' => $this->address,
            'joined' => $this->created_at->diffForHumans(),
        ];
    }
}
