<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Admin/Banner/Index', [
            'banners' => Banner::orderBy('order')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return inertia('Admin/Banner/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        //
        $dataRequest = $request->validated();

        $dataRequest['img_url'] = Storage::disk('public')->put('Banner', $request->file('img_url'));

        Banner::create($dataRequest);

        return redirect()->route('banner.index');
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
    public function edit(Banner $banner)
    {
        //
        return inertia('Admin/Banner/Edit', [
            'banner' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        //
        $dataRequest = $request->validated();

        if ($request->hasFile('img_url')) {
            Storage::disk('public')->delete($banner->img_url);
            $dataRequest['img_url'] = Storage::disk('public')->put('Banner', $request->file('img_url'));
        }

        $banner->update($dataRequest);

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}