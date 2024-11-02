<?php

namespace App\Http\Controllers;

use App\Filters\BrickFilters;
use Illuminate\Http\Request;
use App\Http\Resources\Brick as BrickResource;
use App\Models\Brick;
use TarfinLabs\LaravelSpatial\Types\Point;

class BrickController extends Controller
{
    /**
     * Display a listing of the Brick resource.
     *
     * @param  App\Filters\BrickFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(BrickFilters $request)
    {
        return BrickResource::collection(Brick::filter($request)->paginate(50))->response()
        ->header('Accept', 'application/json')->
          header('Content-Type', 'application/json')->
          header('Charset', 'utf-8');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brick = Brick::create(array_merge($request->all(), 
        (request('lat'))?['location'  => new Point(lat: request('lat'), lng: request('lng')),]:[]));
        return response()->json($brick, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new BrickResource(Brick::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brick = Brick::find($id);
        $brick->update(array_merge($request->all(), 
        (request('lat'))?['location'  => new Point(lat: request('lat'), lng: request('lng')),]:[]));
        return response()->json($brick, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brick::destroy($id);
        return response()->json(null, 204);
    }
}
