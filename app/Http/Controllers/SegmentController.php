<?php

namespace App\Http\Controllers;

use App\Filters\SegmentFilters;
use App\Http\Resources\Segment as SegmentResource;
use App\Models\Segment;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SegmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Filters\HobbyFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(SegmentFilters $request)
    {
        return SegmentResource::collection(Segment::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $segment = Segment::create($request->all());
        return response()->json($segment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new SegmentResource(Segment::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $segment = Segment::find($id);
        $segment->update($request->all());
        return response()->json($segment, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Segment::destroy($id);
        return response()->json(null, 204);
    }
}