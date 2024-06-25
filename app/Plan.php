<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id',
        'name',
        'subscription',
        'status',
        'price',
        'currency',
        'interval_count'
    ];
}
