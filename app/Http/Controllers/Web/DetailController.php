<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function index($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return inertia('Web/Detail', [
            'product' => $product,
        ]);
    }
}
