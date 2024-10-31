<?php

namespace App\Http\Controllers;

use App\Filters\AssignmentFilters;
use Illuminate\Http\Request;

use App\Http\Resources\Assignment as AssignmentResource;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the Assignment resource.
     *
     * @param  App\Filters\AssignmentFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(AssignmentFilters $request)
    {
        return (AssignmentResource::collection(Assignment::filter($request)->paginate(10)))
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
        $assignment = Assignment::create($request->all());
        $request->user()->addPoints(12);
        return response()->json($assignment, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        return new AssignmentResource(Assignment::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $assignment = Assignment::find($id);
        $assignment->update($request->all());
        
        $request->user()->addPoints(6);
        return response()->json($assignment, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Assignment::destroy($id);
        return response()->json(null, 204);
    }
}
