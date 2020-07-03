<?php

namespace App\Http\Resources\Entry;

use Illuminate\Http\Resources\Json\JsonResource;

class EntryPage extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $entry = (new Entry($this->entry))->toArray($request);
        $entry['entity_id'] = $this->id;
        return $entry;
    }
}
