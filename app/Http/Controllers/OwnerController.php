<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Http\Resources\OwnerResource;
use App\Models\Owner;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OwnerResource::collection(Owner::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreOwnerRequest $request)
    {
        Owner::create($request->safe()->toArray());
        $owners = OwnerResource::collection(Owner::all());
        return view('welcome')->with('owners', $owners);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOwnerRequest $request)
    {
        Owner::create($request->safe()->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        $resource = new OwnerResource($owner);

        return view('owners.show')->with('owner', $resource);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        $owner->update($request->safe()->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        $owners = OwnerResource::collection(Owner::all());
        return view('welcome')->with('owners', $owners);
    }
}
