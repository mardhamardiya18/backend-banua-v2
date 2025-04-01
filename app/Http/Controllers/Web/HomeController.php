<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return inertia('Web/Home', [
            'categories' => Category::latest()->get(),
            'banners' => Banner::orderBy('order')->get(),
        ]);
    }
}