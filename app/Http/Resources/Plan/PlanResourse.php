<?php

namespace App\Http\Resources\Plan;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id->getValue(),
            'name' => $this->resource->name,
            'price' => $this->resource->price->getValue(),
            'user_limit' => $this->resource->userLimit,
            'features' => $this->resource->features,
        ];
    }
}
