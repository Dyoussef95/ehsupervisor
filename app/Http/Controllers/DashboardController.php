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
        $thisMonth = getdate()['mon'];
        $month = getdate()['month'];
        foreach($clients as $client){
            if(isset($client->conection)){
                
                $client->users_campus = $client->conection->response();
                
            
                $active = 0;
                $suspended = 0;
                $monthAccess = 0;
            
                foreach($client->users_campus as $user){
                    
                    if($user['suspended']==false){
                        $active++;
                    }else{
                        $suspended++;
                    }
                    
                    if(getdate($user['lastaccess'])['mon']==$thisMonth){
                        $monthAccess++;
                    }
                    
                }
                
                $client->active=$active;
                $client->suspended=$suspended;
                $client->monthAccess=$monthAccess;
        }
           
        }
        //dd($clients);  
        return view('dashboard.index', compact('clients','month'));
       
    }

    public function client_index(Client $client): View
    {
        $thisMonth = getdate()['mon'];
        $month = getdate()['month'];
            if(isset($client->conection)){
                
                $client->users_campus = $client->conection->response();
                
            
                $active = 0;
                $suspended = 0;
                $monthAccess = 0;
            
                foreach($client->users_campus as $user){
                    
                    if($user['suspended']==false){
                        $active++;
                    }else{
                        $suspended++;
                    }
                    
                    if(getdate($user['lastaccess'])['mon']==$thisMonth){
                        $monthAccess++;
                    }
                    
                }
                
                $client->active=$active;
                $client->suspended=$suspended;
                $client->monthAccess=$monthAccess;
        }
           
        $loginsPerMonth = array_reverse($client->conection->logins_per_month());
        return view('dashboard.clients.index', compact('client','month','loginsPerMonth'));
       
    }
}
