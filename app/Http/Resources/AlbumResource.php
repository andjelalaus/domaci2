<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'album';
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'naziv' => $this->resource->naziv,
            'izadvacka_kuca' => $this->resource->izadvacka_kuca,
            'datum'=>$this->resource->datum,
            'opis'=>$this->resource->opis,
            'user'=>new UserResource($this->resource->user)

        ];
    }
}
