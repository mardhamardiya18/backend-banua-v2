<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('Gallery/Index', [
            'galleries' => ProductGallery::with('product')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::latest()->get();
        return Inertia::render('Gallery/Create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequest $request)
    {
        $galleryRequest = $request->validated();

        $galleryRequest['image_url'] = Storage::disk('public')->put('Gallery', $request->file('image_url'));

        ProductGallery::create($galleryRequest);
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductGallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image_url);
        $gallery->delete();
        return redirect()->route('gallery.index');
    }
}
