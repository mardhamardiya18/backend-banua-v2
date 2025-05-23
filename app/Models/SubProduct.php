<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubProduct extends Model
{
    //
    protected $fillable = ['product_id', 'name', 'price', 'discount', 'extra', 'size', 'note', 'is_recommended'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function menuoptions()
    {
        return $this->hasMany(SubproductMenuoption::class, 'menuoption_id', 'id');
    }

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class, 'subproduct_id', 'id');
    }
}
