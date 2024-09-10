<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clients = Client::all();
        $url = 'clients';
        return view('clients.index')
                ->with('clients',$clients)
                ->with('url',$url);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $url = 'clients';
        $plans = Plan::all();
        return view('clients.create')
                ->with('plans',$plans)
                ->with('url',$url);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $client = new Client;
        $client->name = $request->name;
        $client->users = $request->users;
        $client->storage = $request->storage;
        $client->plan_id = $request->plan_id;
        $client->save();
        return redirect(route('clients.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client): View
    {
        $url = 'clients';
        return view('clients.show')
                ->with('client',$client)
                ->with('url',$url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client): View
    {
        $url = 'clients';
        $plans = Plan::all();
        return view('clients.edit')
                ->with('client',$client)
                ->with('plans',$plans)
                ->with('url',$url);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client): RedirectResponse
    {
        $client->name = $request->name;
        $client->users = $request->users;
        $client->storage = $request->storage;
        $client->plan_id = $request->plan_id;
        $client->save();
        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();
        return redirect(route('clients.index'));
    }
}
