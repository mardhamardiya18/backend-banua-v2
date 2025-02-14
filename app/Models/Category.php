<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    //
    protected $fillable = ['name', 'slug', 'img_url'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug']   = Str::slug($value);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
