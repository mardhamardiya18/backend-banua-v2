<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable = ['order_id', 'subproduct_id', 'price', 'quantity', 'subtotal', 'stiker', 'url_stiker', 'note'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function subproduct()
    {
        return $this->belongsTo(SubProduct::class, 'subproduct_id', 'id');
    }

    public function orderItemMenuoptions()
    {
        return $this->hasMany(OrderItemMenuoption::class, 'orderitem_id', 'id');
    }
}
