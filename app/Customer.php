<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class Customer extends Model
{
    use Billable;
    protected $fillable =[
        "stripe_id",
        "customer_group_id", "user_id", "name", "company_name",
        "email", "phone_number", "tax_no", "address", "city",
        "state", "postal_code", "country", "points", "deposit", "expense", "is_active","pm_type","pm_last_four"
    ];

    public function customerGroup()
    {
        return $this->belongsTo('App\CustomerGroup');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function discountPlans()
    {
        return $this->belongsToMany('App\DiscountPlan', 'discount_plan_customers');
    }
}
