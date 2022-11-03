<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'identify' => $this->uuid,
            'category' => new CategoryResource($this->category),
            'name' => $this->name,
            'url' => $this->url,
            'phone'=> $this->phone,
            'whatsapp'=> $this->whatsapp,
            'email'=> $this->email,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'youtube'=> $this->youtube,
         ];
    }
}
