<?php

namespace App\Http\Controllers;

use App\Filters\ClientTypeFilters;
use App\Http\Resources\ClientType as ClientTypeResource;
use App\Models\ClientType;
use Illuminate\Http\Request;

class ClientTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Filters\ClientTypeFilters  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ClientTypeFilters $request)
    {
        return ClientTypeResource::collection(ClientType::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client_type = ClientType::create($request->all());
        return response()->json($client_type, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ClientTypeResource(ClientType::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client_type = ClientType::find($id);
        $client_type->update($request->all());
        return response()->json($client_type, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ClientType::destroy($id);
        return response()->json(null, 204);
    }
}