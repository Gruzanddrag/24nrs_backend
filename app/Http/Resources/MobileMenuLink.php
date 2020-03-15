<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MobileMenuLink extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $link = [
            'id' => $this->id,
            'text' => $this->text,
            'url_id' => $this->url_id,
            'customUrl'=> $this->customUrl,
            'children' => $this->children
        ];
        if(!isset($link['children'][0])){
            unset($link['children']);
        }
        return $link;
    }
}
