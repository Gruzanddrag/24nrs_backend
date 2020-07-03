<?php

namespace App\Http\Resources\FAQ;

use Illuminate\Http\Resources\Json\JsonResource;

class FaqPage extends JsonResource
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
            'id' => $this->category->id,
            'name' => $this->category->name,
            'entity_id' => $this->id
        ];
    }
}
