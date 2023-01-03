<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BankResource extends JsonResource
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
            'bank' => $this->bank,
            'ac_no' => $this->ac_no,
            'ifsc_code' => $this->ifsc_code,
            'micr' => $this->micr,
            'address' => $this->address,
            'phone' => $this->phone,
            'fax' => $this->fax,
            'email' => $this->email,
            'remark' => $this->remark,
            'contact_person' => $this->contact_person,
            'mobile' => $this->mobile,
            'designation' => $this->designation,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
