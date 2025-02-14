<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['name', 'email', 'no_telp', 'address', 'link_map', 'delivery_time', 'no_inv'];
}
