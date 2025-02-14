<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable = ['order_id', 'subproduct_id', 'price', 'quantity', 'subtotal', 'stiker', 'url_stiker', 'note'];
}
