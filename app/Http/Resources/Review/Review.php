<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class Review extends JsonResource
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
            'id' => $this->id,
            'img' => $this->img,
            'lead' => $this->lead,
            'authorPosition' => $this->authorPosition,
            'authorName' => $this->authorName,
            'document' => $this->document->document,
            'extension' => $this->document->extension,
        ];
    }
}
