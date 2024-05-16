<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index(): View
    {
        $clients = Client::all();
        foreach($clients as $client){
            $client->users = $client->connection->response();
        }
        return view('dashboard.index')->with('clients',$clients);
    }
}
