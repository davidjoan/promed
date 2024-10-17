<?php

namespace App\Http\Controllers;

use App\Filters\InstitutionTypeFilters;
use App\Http\Resources\InstitutionType as InstitutionTypeResource;
use App\Models\InstitutionType;
use Illuminate\Http\Request;

class InstitutionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Filters\InstitutionTypeFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(InstitutionTypeFilters $request)
    {
        return InstitutionTypeResource::collection(InstitutionType::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $institution_type = InstitutionType::create($request->all());
        return response()->json($institution_type, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new InstitutionTypeResource(InstitutionType::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $institution_type = InstitutionType::find($id);
        $institution_type->update($request->all());
        return response()->json($institution_type, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        InstitutionType::destroy($id);
        return response()->json(null, 204);
    }
}