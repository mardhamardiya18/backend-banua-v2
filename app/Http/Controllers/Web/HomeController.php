<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return inertia('Web/Home', [
            'categories' => Category::latest()->get(),
            'banners' => Banner::orderBy('order')->where('active', true)->get(),
        ]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return inertia('Web/Category', [
            'category' => $category,
            'categories' => Category::latest()->get(),
            'banners' => Banner::orderBy('order')->where('active', true)->get(),
        ]);
    }
    public function product()
    {
        return inertia('Web/Detail');
    }
}
