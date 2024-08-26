<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Http;

class Connection extends Model
{
    use HasFactory;

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function response()
    {
        $url = $this->url.'/webservice/rest/server.php';
        $response = Http::get($url.'?wstoken='.$this->token.'&wsfunction=core_user_get_users&criteria[0][key]=email&criteria[0][value]=%%&moodlewsrestformat=json');
        return $response->collect()->first();
    }

    public function testConnection(): int
    {
        $url = $this->url.'/webservice/rest/server.php';
        
        $response = Http::get($url.'?wstoken='.$this->token.'&wsfunction=core_user_get_users&criteria[0][key]=email&criteria[0][value]=%%&moodlewsrestformat=json');
        //Error en token
        if($response->collect()->get('errorcode')=="invalidtoken"){
            return 1;
        }
        //Error en url
        else if(!$response->successful()){
            return 2;
        }
        else{
            return 0;
        }
    }

    public function logins_per_month(){
        $url = $this->url.'/webservice/rest/server.php';
        $response = Http::get($url.'?wstoken='.$this->token.'&wsfunction=block_configurable_reports_get_report_data&reportid='.$this->users_access_report_id);
        //$response = Http::get('https://plataforma3.ehcampus.online/webservice/rest/server.php?wstoken=59e19f8eef36ca1aae822773fa417a05&wsfunction=block_configurable_reports_get_report_data&reportid=1');
        $xml = simplexml_load_string($response->body())->children()->children()->children();
        $xml2 = simplexml_load_string($response->body());
        $json = json_decode($xml, true);
        return $json;
       
    }
}
