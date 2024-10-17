<?php

namespace App\Http\Controllers;

use App\Filters\JobPositionFilters;
use App\Http\Resources\JobPosition as JobPositionResource;
use App\Models\JobPosition;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Filters\HobbyFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(JobPositionFilters $request)
    {
        return JobPositionResource::collection(JobPosition::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $job_position = JobPosition::create($request->all());
        return response()->json($job_position, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new JobPositionResource(JobPosition::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job_position = JobPosition::find($id);
        $job_position->update($request->all());
        return response()->json($job_position, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        JobPosition::destroy($id);
        return response()->json(null, 204);
    }
}