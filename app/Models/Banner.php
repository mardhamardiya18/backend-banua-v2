<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $fillable = [
        'url',
        'img_url',
        'order',
        'active'
    ];
}