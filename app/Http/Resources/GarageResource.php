<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GarageResource extends JsonResource
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
            'workshop' => $this->workshop,
            'contact_person' => $this->contact_person,
            'mobile' => $this->mobile,
            'authorized' => $this->authorized,
            'remark' => $this->remark,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
