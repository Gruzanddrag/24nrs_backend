<?php

namespace App\Http\Resources\Document;

use Illuminate\Http\Resources\Json\JsonResource;

class Document extends JsonResource
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
            'title' => $this->title,
            'preview' => $this->preview,
            'date' => $this->date,
            'extension' => $this->extension,
            'document' => $this->document,
        ];
    }
}
