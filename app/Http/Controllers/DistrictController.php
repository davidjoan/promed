<?php

namespace App\Http\Controllers;

use App\Filters\DistrictFilters;
use App\Http\Resources\District as DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;
use TarfinLabs\LaravelSpatial\Types\Point;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Resources\Visit  $request
     * @return \Illuminate\Http\Response
     */
    public function index(DistrictFilters $request)
    {
        return DistrictResource::collection(District::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $district = District::create(array_merge($request->all(), 
        (request('lat'))?['location'  => new Point(lat: request('lat'), lng: request('lng')),]:[]));
        return response()->json($district, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new DistrictResource(District::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $district = District::find($id);
        $district->update(array_merge($request->all(), 
        (request('lat'))?['location'  => new Point(lat: request('lat'), lng: request('lng')),]:[]));
        return response()->json($district, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        District::destroy($id);
        return response()->json(null, 204);
    }
}