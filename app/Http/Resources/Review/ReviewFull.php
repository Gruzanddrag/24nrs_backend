<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewFull extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $resource = [
            'id' => $this->id,
            'img' => $this->imgFile->file ?? "",
            'lead' => $this->lead,
            'href' => $this->href,
            'content' => $this->content,
            'authorPosition' => $this->authorPosition,
            'authorName' => $this->authorName,
            'document' => $this->document,
            'extension' => $this->document->extension,
        ];
        $resource['document']['document'] = $this->document->documentFile->file;
        $resource['document']['preview'] = $this->document->documentFile->preview;
        unset($resource['document']['document_file']);
        return $resource;
    }
}
