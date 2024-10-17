<?php

namespace App\Http\Controllers;

use App\Filters\OrganizationTypeFilters;
use App\Http\Resources\OrganizationType as OrganizationTypeResource;
use App\Models\OrganizationType;
use Illuminate\Http\Request;

class OrganizationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Resources\Visit  $request
     * @return \Illuminate\Http\Response
     */
    public function index(OrganizationTypeFilters $request)
    {
        return OrganizationTypeResource::collection(OrganizationType::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $organization_type = OrganizationType::create($request->all());
        return response()->json($organization_type, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new OrganizationTypeResource(OrganizationType::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $organization_type = OrganizationType::find($id);
        $organization_type->update($request->all());
        return response()->json($organization_type, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OrganizationType::destroy($id);
        return response()->json(null, 204);
    }
}