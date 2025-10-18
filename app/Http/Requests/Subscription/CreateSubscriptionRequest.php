<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubscriptionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => 'required|exists:companies,id',
            'plan_id' => 'required|exists:plans,id',
            'start_at' => 'required|date',
        ];
    }
}
