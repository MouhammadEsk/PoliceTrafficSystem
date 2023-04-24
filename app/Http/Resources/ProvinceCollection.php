<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceCollection extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
        //    'created_at'=>$this->created_at->format('Y-m-d'),
            // 'description'=>$this->description,

            // 'office'=>new OfficeResource($this->whenloaded('Office')),
        ];
    }
}
