<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_address extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'order_id',
    ];
}
