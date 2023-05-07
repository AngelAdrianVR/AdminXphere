<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IncedentResource extends JsonResource
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
            'id' => $this->id,
            'subject' => $this->subject,
            'description' => $this->description,
            'is_solved' => $this->is_solved,
            'sphere_id' => $this->sphere_id,
            'created_at' => $this->created_at->isoformat('DD MMM, YYYY hh:mm a'),
            'updated_at' => $this->created_at->isoformat('DD MMM, YYYY hh:mm a'),
            'user' => $this->whenLoaded('user'),
        ];
    }
}
