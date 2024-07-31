<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Client $client): View
    {
        return view('connections.index')
                ->with('client',$client);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Client $client): View
    {
        return view('connections.create')
                ->with('client',$client);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Client $client, Request $request): RedirectResponse
    {
        $connection = new Connection;
        $connection->url = $request->url;
        $connection->token = $request->token;
        $connection->client_id = $client->id;
        $connection->save();
        return redirect(route('clients.connections.index', $client));
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Client $client, Connection $connection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client, Connection $connection): View
    {
        return view('connections.edit')
                ->with('client',$client)
                ->with('connection',$connection);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Client $client, Request $request, Connection $connection): RedirectResponse
    {
        $connection->url = $request->url;
        $connection->token = $request->token;
        $connection->client_id = $client->id;
        $connection->save();
        return redirect(route('clients.connections.index', $client));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client, Connection $connection): RedirectResponse
    {
        $connection->delete();
        return redirect(route('clients.connections.index', $client));
    }
}
