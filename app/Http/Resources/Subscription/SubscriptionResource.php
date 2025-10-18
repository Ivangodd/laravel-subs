<?php

namespace App\Http\Resources\Subscription;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id->getValue(),
            'company_id' => $this->resource->companyId->getValue(),
            'plan_id' => $this->resource->planId->getValue(),
            'start_At' => $this->resource->period->startAt->format('Y-m-d'),
            'end_At' => $this->resource->period->endAt->format('Y-m-d'),
            'is_active' => now()->between(
                $this->resource->period->startAt,
                $this->resource->period->endAt,
            )
        ];
    }
}
