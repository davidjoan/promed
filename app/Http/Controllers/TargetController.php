<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Target as TargetResource;
use App\Models\Target;


class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TargetResource::collection(Target::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $target = Target::create($request->all());
        return response()->json($target, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new TargetResource(Target::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Target::find($id);
        $target->update($request->all());
        return response()->json($target, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Target::destroy($id);
        return response()->json(null, 204);
    }
}
