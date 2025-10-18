<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    protected $table = 'companies';
    protected $fillable = ['name', 'email'];

    public function subscription()
    {
        return $this->hasMany(SubscriptionModel::class, 'company_id');
    }

    public function currentSubscription()
    {
        return $this->hasOne(SubscriptionModel::class, 'company_id')->where('end_at', '>', now());
    }

}
