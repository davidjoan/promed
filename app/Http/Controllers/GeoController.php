<?php

namespace App\Http\Controllers;

use App\Filters\GeoFilters;
use Illuminate\Http\Request;
use App\Http\Resources\Geo as GeoResource;
use App\Models\Geo;

class GeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Resources\Geo  $request
     * @return \Illuminate\Http\Response
     */
    public function index(GeoFilters $request)
    {
        return GeoResource::collection(Geo::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $geo = Geo::create($request->all());
        return response()->json($geo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new GeoResource(Geo::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $geo = Geo::find($id);
        $geo->update($request->all());
        return response()->json($geo, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        Geo::destroy($id);
        return response()->json(null, 204);
    }
}
