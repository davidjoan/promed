<?php

namespace App\Http\Controllers;

use App\Filters\BrickFilters;
use Illuminate\Http\Request;
use App\Http\Resources\Brick as BrickResource;
use App\Models\Brick;

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
        return BrickResource::collection(Brick::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brick = Brick::create($request->all());
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
        $brick->update($request->all());
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
