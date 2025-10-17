<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class PlanModel extends Model
{
    protected $table = 'plans';
    protected $fillable = ['name', 'price', 'user_limit', 'features'];

    protected $cats = [
        'price' => 'float',
        'features' => 'array'
    ];
}
