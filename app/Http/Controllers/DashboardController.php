<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index(): View
    {
        $url = 'dashboard';
        $clients = Client::all();
        $thisMonth = getdate()['mon'];
        $thisYear = getdate()['year'];
        $month = getdate()['month'];
        foreach($clients as $client){
            if(isset($client->conection)){
                
                $client->users_campus = $client->conection->allUsers();
        
                $monthAccess = 0;
                foreach($client->users_campus as $user){
                    if(getdate($user['lastaccess'])['mon']==$thisMonth && 
                    getdate($user['lastaccess'])['year']==$thisYear){
                        $monthAccess++;
                    }
                    
                }
                $client->all = count($client->users_campus);
                $client->active=$client->conection->onlyActive();
                $client->suspended=$client->all - $client->active;
                $client->monthAccess=$monthAccess;
        }
           
        }

        return view('dashboard.index', compact('clients','month','url'));
       
    }

    public function client_index(Client $client): View
    {
        $url = 'dashboard';
        $thisMonth = getdate()['mon'];
        $thisYear = getdate()['year'];
        $month = getdate()['month'];
            if(isset($client->conection)){
                
                $client->users_campus = $client->conection->allUsers();
        
                $monthAccess = 0;
                foreach($client->users_campus as $user){
                    if(getdate($user['lastaccess'])['mon']==$thisMonth && 
                    getdate($user['lastaccess'])['year']==$thisYear){
                        $monthAccess++;
                    }
                    
                }
                $client->all = count($client->users_campus);
                $client->active=$client->conection->onlyActive();
                $client->suspended=$client->all - $client->active;
                $client->monthAccess=$monthAccess;
        }
             
        $loginsPerMonth = array_reverse($client->conection->logins_per_month());
        return view('dashboard.clients.index', compact('client','month','loginsPerMonth','url'));
       
    }
}
