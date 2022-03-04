<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonographRequest;
use App\Http\Requests\UpdateMonographRequest;
use App\Models\Monograph;

class MonographController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monographs = Monograph::all();

        return view('monographs.index', [
            'monographs' => $monographs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monographs.create', [
            'monograph' => new Monograph(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMonographRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonographRequest $request)
    {
        $validated = $request->validated();
        $monograph = new Monograph($validated);
        $monograph->save();

        return redirect()->route('monographs.store')
            ->with('success', "Monografía $monograph->title creada correctamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monograph  $monograph
     * @return \Illuminate\Http\Response
     */
    public function show(Monograph $monograph)
    {
        return view('monographs.show', [
            'monograph' => $monograph,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monograph  $monograph
     * @return \Illuminate\Http\Response
     */
    public function edit(Monograph $monograph)
    {
        return view('monographs.edit', [
            'monograph' => $monograph,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonographRequest  $request
     * @param  \App\Models\Monograph  $monograph
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonographRequest $request, Monograph $monograph)
    {
        $validated = $request->validated();
        $monograph->title = $validated['title'];
        $monograph->year = $validated['year'];
        $monograph->save();

        return redirect()->route('monographs.index')
            ->with('success', "Monografía $monograph->title editada correctamente!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monograph  $monograph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monograph $monograph)
    {
        //
    }
}
