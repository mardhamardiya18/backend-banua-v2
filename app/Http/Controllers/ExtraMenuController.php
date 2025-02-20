<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubproductMenuOptionRequest;
use App\Models\MenuOption;
use App\Models\SubProduct;
use App\Models\SubproductMenuoption;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExtraMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('ExtraMenu/Index', [
            'items' => SubproductMenuoption::with(['subproduct.product', 'menuoption'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ExtraMenu/Create', [
            'subproducts' => SubProduct::with('product')->latest()->get(),
            'menuoptions' => MenuOption::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubproductMenuOptionRequest $request)
    {
        $data = $request->validated();
        SubproductMenuoption::create($data);
        return redirect()->route('extra-menu.index');
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
    public function edit(SubproductMenuoption $extraMenu)
    {
        return Inertia::render('ExtraMenu/Edit', [
            'extraMenu' => $extraMenu,
            'subproducts' => SubProduct::with('product')->latest()->get(),
            'menuoptions' => MenuOption::latest()->get()
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SubproductMenuOptionRequest $request, SubproductMenuoption $extraMenu)
    {
        $data = $request->validated();
        $extraMenu->update($data);
        return redirect()->route('extra-menu.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubproductMenuoption $extraMenu)
    {
        $extraMenu->delete();
        return redirect()->route('extra-menu.index');
    }
}
