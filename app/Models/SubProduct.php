<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubProduct extends Model
{
    //
    protected $fillable = ['product_id', 'portion', 'price', 'discount', 'extra', 'size', 'note'];
}
