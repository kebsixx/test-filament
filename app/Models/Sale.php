<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'sale_date',
        'product_id',
        'customer_id',
        'quantity',
        'total_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    protected static function booted()
    {
        static::created(function ($sale) {
            $product = $sale->product;
            if ($product) {
                $product->stock -= $sale->quantity;
                $product->save();
            }
        });

        static::deleted(function ($sale) {
            $product = $sale->product;
            if ($product) {
                $product->stock += $sale->quantity;
                $product->save();
            }
        });
    }
}
