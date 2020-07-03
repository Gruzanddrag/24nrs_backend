<?php

namespace App\Http\Resources\Entry;

use Illuminate\Http\Resources\Json\JsonResource;

class Entry extends JsonResource
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
            'preview' => $this->previewImg->file ?? "",
            'lead' => $this->lead,
            'category' => $this->category,
            'theme' => $this->theme_id,
            'date' => $this->date,
            'view_count' => $this->view_count
        ];
    }
}
