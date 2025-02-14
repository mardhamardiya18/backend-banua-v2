<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    //
    protected $fillable = ['name', 'slug', 'description', 'category_id'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug']   = Str::slug($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subProducts()
    {
        return $this->hasMany(SubProduct::class);
    }

    public function productGalleries()
    {
        return $this->hasMany(ProductGallery::class);
    }
}
