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

        $response = Http::get($url.'?wstoken='.$this->token.'&wsfunction=core_user_get_users&criteria[0][key]=email&criteria[0][value]=%%&moodlewsrestformat=json')
        ->collect();
        return collect($response->first());
    }
}
