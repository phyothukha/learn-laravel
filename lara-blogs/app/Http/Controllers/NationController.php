<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNationRequest;
use App\Http\Requests\UpdateNationRequest;
use App\Models\Nation;

class NationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Nation $nation)
    {
        return $nation->posts;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nation $nation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNationRequest $request, Nation $nation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nation $nation)
    {
        //
    }
}
