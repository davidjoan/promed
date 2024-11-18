<?php

namespace App\Http\Controllers;

use App\Filters\TargetFilters;
use Illuminate\Http\Request;
use App\Http\Resources\Target as TargetResource;
use App\Models\Target;


class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Filters\TargetFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(TargetFilters $request)
    {
        return (TargetResource::collection(Target::filter($request)->paginate(5)))
        ->response()
        ->header('Accept', 'application/json')->
          header('Content-Type', 'application/json')->
          header('Charset', 'utf-8');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $target = Target::create($request->all());
        $request->user()->addPoints(12);
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
        $request->user()->addPoints(6);
        return response()->json($target, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $target = Target::find($id);
        $target->update(['active' => '0']); 
        $target->delete();
        return response()->json(null, 204);
    }
}
