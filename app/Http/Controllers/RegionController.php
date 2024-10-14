<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Region as RegionResource;
use App\Models\Region;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RegionResource::collection(Region::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $region = Region::create($request->all());
        return response()->json($region, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new RegionResource(Region::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $region = Region::find($id);
        $region->update($request->all());
        return response()->json($region, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Region::destroy($id);
        return response()->json(null, 204);
    }
}
