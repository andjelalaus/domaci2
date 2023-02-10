<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PesmeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'pesma';
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'ime' => $this->resource->ime,
            'album_id' => new AlbumResource($this->resource->album),
            'trajanje'=>$this->resource->trajanje,
            'dodatan_izvodjac'=>$this->resource->dodatan_izvodjac,
            
        ];
    }
}
