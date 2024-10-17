<?php

namespace App\Http\Controllers;

use App\Filters\TuitionFilters;
use App\Http\Resources\Tuition as TuitionResource;
use App\Models\Tuition;
use Illuminate\Http\Request;

class TuitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Filters\HobbyFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(TuitionFilters $request)
    {
        return TuitionResource::collection(Tuition::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tuition = Tuition::create($request->all());
        return response()->json($tuition, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new TuitionResource(Tuition::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tuition = Tuition::find($id);
        $tuition->update($request->all());
        return response()->json($tuition, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tuition::destroy($id);
        return response()->json(null, 204);
    }
}