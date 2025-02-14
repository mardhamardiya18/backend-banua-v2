<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubproductMenuoption extends Model
{
    //
    protected $fillable = ['subproduct_id', 'menu_option_id'];

    public function subproduct()
    {
        return $this->belongsTo(Subproduct::class, 'subproduct_id', 'id');
    }

    public function menuoption()
    {
        return $this->belongsTo(MenuOption::class, 'menuoption_id', 'id');
    }
}
