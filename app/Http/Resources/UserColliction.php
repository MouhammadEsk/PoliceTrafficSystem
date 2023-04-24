<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserColliction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return[

            'id'=>$this->id,
            'name'=>$this->name,
            'DOB'=>$this->DOB,
            'nationallity'=>$this->nationallity,
            'blood_type'=>$this->blood_type,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'location'=>$this->location,
            'street'=>$this->street,

        ];
    }
}
