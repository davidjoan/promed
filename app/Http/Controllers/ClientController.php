<?php

namespace App\Http\Controllers;

use App\Filters\ClientFilters;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\Client as ClientResource;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClientFilters $request)
    {
        return ClientResource::collection(Client::filter($request)->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = Client::create($request->all());
        $request->user()->addPoints(10);
        $hobbies = json_decode(request('hobbies'));
        if($hobbies){
            $client->hobbies()->attach($hobbies);
        }

        $specialties = json_decode(request('specialties'));
        if($specialties){
            $client->specialties()->attach($specialties);
        }
        return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ClientResource(Client::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        $client->update($request->all());
        $request->user()->addPoints(5);

        $hobbies = json_decode(request('hobbies'));
        if($hobbies){
            $client->hobbies()->sync($hobbies);
        }

        $specialties = json_decode(request('specialties'));
        if($specialties){
            $client->specialties()->sync($specialties);
        }
        return response()->json($client, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::destroy($id);
        return response()->json(null, 204);
    }
}
