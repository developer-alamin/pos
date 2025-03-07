<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Sale extends Model
{
    protected $table = 'product_sales';
    protected $fillable = [
        "sale_id", "product_id", "product_batch_id", "variant_id", 'imei_number', "qty", "sale_unit_id", "net_unit_price", "discount", "tax_rate", "tax", "total"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
