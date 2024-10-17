<?php

namespace App\Http\Controllers;

use App\Filters\UniversityFilters;
use App\Http\Resources\University as UniversityResource;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Filters\HobbyFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(UniversityFilters $request)
    {
        return UniversityResource::collection(University::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $university = University::create($request->all());
        return response()->json($university, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new UniversityResource(University::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $university = University::find($id);
        $university->update($request->all());
        return response()->json($university, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        University::destroy($id);
        return response()->json(null, 204);
    }
}