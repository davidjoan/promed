<?php

namespace App\Http\Controllers;

use App\Filters\InstitutionFilters;
use App\Http\Resources\Institution as InstitutionResource;
use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Resources\Visit  $request
     * @return \Illuminate\Http\Response
     */
    public function index(InstitutionFilters $request)
    {
        return InstitutionResource::collection(Institution::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $institution = Institution::create($request->all());
        return response()->json($institution, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(InstitutionFilters $request, string $id)
    {
        return new InstitutionResource(Institution::filter($request)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $institution = Institution::find($id);
        $institution->update($request->all());
        return response()->json($institution, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Institution::destroy($id);
        return response()->json(null, 204);
    }
}