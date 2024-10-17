<?php

namespace App\Http\Controllers;

use App\Filters\HobbyFilters;
use App\Http\Resources\Hobby as HobbyResource;
use App\Models\Hobby;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Filters\HobbyFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(HobbyFilters $request)
    {
        return HobbyResource::collection(Hobby::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hobby = Hobby::create($request->all());
        return response()->json($hobby, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new HobbyResource(Hobby::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hobby = Hobby::find($id);
        $hobby->update($request->all());
        return response()->json($hobby, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Hobby::destroy($id);
        return response()->json(null, 204);
    }
}