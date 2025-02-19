<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubproductRequest;
use App\Http\Requests\SubproductUpdateRequest;
use App\Models\Product;
use App\Models\SubProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubproductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Subproduct/Index', [
            'subproducts' => SubProduct::with('product')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::latest()->get();
        return Inertia::render('Subproduct/Create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubproductRequest $request)
    {
        $subproductRequest = $request->validated();
        SubProduct::create($subproductRequest);
        return redirect()->route('subproduct.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubProduct $subproduct)
    {
        $products = Product::latest()->get();
        return Inertia::render('Subproduct/Edit', [
            'subproduct' => $subproduct,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubproductUpdateRequest $request, SubProduct $subproduct)
    {
        $subproductRequest = $request->validated();
        $subproduct->update($subproductRequest);
        return redirect()->route('subproduct.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubProduct $subproduct)
    {
        $subproduct->delete();
        return redirect()->route('subproduct.index');
    }
}
