<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentationProductResources extends JsonResource
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
            'id_prod' => $this->id,
            'name' => $this->name,
            'detail' => $this->detail,
            'created' => Carbon_diffForHumans($this->created_at),
            'updated' => ($this->updated_at <= $this->created_at) ? 'Never updated' : Carbon_diffForHumans($this->updated_at)
        ];
    }
}
