<?php

namespace App\Http\Resources;

use App\Models\province;
use App\Models\User;
use App\Models\violation_type;
use Illuminate\Http\Resources\Json\JsonResource;

class ViolationCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
        'id' => $this->id,
        'number' => $this->number,
        'important' => $this->important,
        'title' => $this->title,
        'location' => $this->location,
        'post_date' => $this->post_date,
        'trial_time' => $this->whenAppended('trial_time'),

        'car' =>new CarCollection($this->car),
        'violation_type' =>new ViolationTypeCollection($this->violation_type) ,
        'province' =>new ProvinceCollection($this->province) ,
        'user' =>new UserColliction($this->whenloaded('user')) ,
        ];
    }
}
