<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionModel extends Model
{
    protected $table = 'subscription';
    protected $fillable = ['company_id', 'plan_id', 'start_at', 'end_at'];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime'
    ];

    function plan()
    {
        return $this->belongsTo(PlanModel::class, 'plan_id');
    }

    function company()
    {
        return $this->belongsTo(CompanyModel::class, 'company_id');
    }
}
