<?php

namespace App\Http\Controllers;

use App\Filters\OrganizationFilters;
use Illuminate\Http\Request;
use App\Http\Resources\Organization as OrganizationResource;
use App\Models\Organization;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the Organization resource.
     *
     * @param  App\Filters\OrganizationFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(OrganizationFilters $request)
    {
        return OrganizationResource::collection(Organization::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $organization = Organization::create($request->all());
        return response()->json($organization, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new OrganizationResource(Organization::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $organization = Organization::find($id);
        $organization->update($request->all());
        return response()->json($organization, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Organization::destroy($id);
        return response()->json(null, 204);
    }
}
