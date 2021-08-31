<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_product extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id'];

    public function products()
    {
        return $this->belongsTo(product::class, 'product_id');
    }

    public function getFullPrice($cartId)
    {
        $totalPrice = 0;
        $cart_product = Cart_product::where('cart_id', $cartId)->get();
        foreach ($cart_product as $product) {
            $totalPrice += (
                $product->products->price * $product->count
            );
        }
        return $totalPrice;
    }
}
