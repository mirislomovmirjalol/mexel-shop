<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    use HasFactory;

    protected $fillable = ['order_id'];

    public function products()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function getFullPrice($orderId)
    {
        $totalPrice = 0;
        $order_product = order_product::where('order_id', $orderId)->get();
        foreach ($order_product as $product) {
            $totalPrice += (
                $product->products->price * $product->count
            );
        }
        return $totalPrice;
    }
}
