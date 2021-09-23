<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function address()
    {
        return Order_address::where('order_id',$this->id)->first();
    }

    public function user()
    {
        return User::where('id',$this->user_id)->first();
    }
}
