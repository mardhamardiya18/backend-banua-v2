<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimoniRequest;
use App\Http\Requests\UpdateTestimoniRequest;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Event\Code\Test;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Admin/Testimoni/Index', [
            'testies' => Testimoni::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return inertia('Admin/Testimoni/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimoniRequest $request)
    {
        //
        $dataRequest = $request->validated();

        $dataRequest['img_url'] = Storage::disk('public')->put('Testimoni', $request->file('img_url'));

        Testimoni::create($dataRequest);

        return redirect()->route('testimoni.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimoni $testimoni)
    {
        //
        Storage::disk('public')->delete($testimoni->img_url);
        $testimoni->delete();
        return redirect()->route('testimoni.index');
    }
}
