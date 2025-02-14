<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuOption extends Model
{
    //
    protected $fillable = ['name', 'extra_price', 'menu_type'];

    public function subproducts()
    {
        return $this->hasMany(SubproductMenuoption::class, 'subproduct_id', 'id');
    }

    public function orderitemmenuoptions()
    {
        return $this->hasMany(OrderitemMenuoption::class, 'menuoption_id', 'id');
    }
}
