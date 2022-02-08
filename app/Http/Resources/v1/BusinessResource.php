<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
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
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'business_name' => $this->business_name,
            'description' => $this->description,
            'landmark' => $this->land_mark,
            'address' => $this->address,
            'contact' => $this->contact,
            'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at
        ];
    }
}
