<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $randoms = Product::inRandomOrder()
            ->take(4)
            ->with(['subProducts' => function ($query) {
                $query->orderBy('price', 'asc')->limit(1);
            }])
            ->get();

        return inertia('Web/Home', [
            'categories' => Category::latest()->get(),
            'banners' => Banner::orderBy('order')->where('active', true)->get(),
            'is_recommends' => SubProduct::with('product')->where('is_recommended', true)->limit(3)->get(),
            'randoms' => $randoms,
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
}
