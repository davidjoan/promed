<?php

namespace App\Http\Controllers;

use App\Filters\SpecialtyFilters;
use App\Http\Resources\Specialty as SpecialtyResource;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Filters\SpecialtyFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(SpecialtyFilters $request)
    {
        return SpecialtyResource::collection(Specialty::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $specialty = Specialty::create($request->all());
        return response()->json($specialty, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new SpecialtyResource(Specialty::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $specialty = Specialty::find($id);
        $specialty->update($request->all());
        return response()->json($specialty, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Specialty::destroy($id);
        return response()->json(null, 204);
    }
}