<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Closure;

class ConnectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Client $client): View
    {
        $url = 'clients';
        return view('connections.index')
                ->with('client',$client)
                ->with('url',$url);
                
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Client $client): View
    {
        $url = 'clients';
        return view('connections.create')
                ->with('client',$client)
                ->with('url',$url);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Client $client, Request $request): RedirectResponse
    {
        

        $connection = new Connection;
        $connection->url = $request->url;
        $connection->token = $request->token;
        $connection->users_access_report_id = $request->users_access_report_id;
        $connection->users_active_report_id = $request->users_active_report_id;
        $test = $connection->testConnection();
       
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'users_access_report_id' => 'required|integer',
            'users_active_report_id' => 'required|integer',
            'url' => 'required|unique:App\Models\Connection,url',
        ]);

        if($test==1){
            return dd("error 1"); back();
        }else if($test==2){
            //return dd("error 2");
          

 
            $validator2 = Validator::make($request->all(), [

                'url' => [
                    function (string $attribute, mixed $value, Closure $fail) {
                       
                        if ($value==$value) {
                            $fail("La conexión con la {$attribute} falló. Habilite los web services");
                        }
                    },
                ],
                
            ])->validate();
            
            
        }
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
        $url = 'clients';
        return view('connections.edit')
                ->with('client',$client)
                ->with('connection',$connection)
                ->with('url',$url);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Client $client, Request $request, Connection $connection): RedirectResponse
    {
        $connection->url = $request->url;
        $connection->token = $request->token;
        $connection->client_id = $client->id;
        $connection->users_access_report_id = $request->users_access_report_id;
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
