<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuoptionRequest;
use App\Models\MenuOption;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MenuOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Admin/MenuOption/Index', [
            'menuOptions' => MenuOption::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('MenuOption/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuoptionRequest $request)
    {
        //
        $menuOptionRequest = $request->validated();
        MenuOption::create($menuOptionRequest);
        return redirect()->route('menu-option.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuOption $menuOption)
    {
        //
        $menuOption->delete();
        return redirect()->route('menu-option.index');
    }
}
