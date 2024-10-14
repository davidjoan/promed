<?php

namespace App\Http\Controllers;

use App\Filters\ScheduleFilters;
use Illuminate\Http\Request;

use App\Http\Resources\Schedule as ScheduleResource;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Resources\Visit  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ScheduleFilters $request)
    {
        return ScheduleResource::collection(Schedule::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schedule = Schedule::create($request->all());
        return response()->json($schedule, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ScheduleResource(Schedule::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $schedule = Schedule::find($id);
        $schedule->update($request->all());
        return response()->json($schedule, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Schedule::destroy($id);
        return response()->json(null, 204);
    }
}
