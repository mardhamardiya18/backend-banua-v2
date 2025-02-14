<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderitemMenuoption extends Model
{
    //
    protected $fillable = ['orderitem_id', 'menu_option_id'];

    public function orderitem()
    {
        return $this->belongsTo(OrderItem::class, 'orderitem_id', 'id');
    }

    public function menuoption()
    {
        return $this->belongsTo(MenuOption::class, 'menuoption_id', 'id');
    }
}
