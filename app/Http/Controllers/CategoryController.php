<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Category/Index', [
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //

        $dataRequest = $request->validated();

        $dataRequest['img_url'] = Storage::disk('public')->put('Category', $request->file('img_url'));


        Category::create($dataRequest);

        return redirect()->route('category.index');
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
    public function edit(Category $category)
    {
        return Inertia::render('Category/Edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $dataRequest = $request->validated();

        if ($request->img_url) {
            Storage::disk('public')->delete($category->img_url);
            $dataRequest['img_url'] = Storage::disk('public')->put('Category', $request->file('img_url'));
        } else {
            $dataRequest['img_url'] = $category->img_url;
        }

        $category->update($dataRequest);

        return to_route('category.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::disk('public')->delete($category->img_url);
        $category->delete();

        return to_route('category.index');
    }
}
