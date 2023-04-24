<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserColliction;

class CarCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'number'=>$this->number,
            'brand'=>$this->brand,
            'type'=>$this->type,
            'model'=>$this->model,
            'category'=>$this->category,
            'year'=>$this->year,
            'color'=>$this->color,
            'province'=>new ProvinceCollection($this->whenLoaded('province')),
            'user'=>new UserColliction($this->whenLoaded('user')) ,


        ];
    }
}
