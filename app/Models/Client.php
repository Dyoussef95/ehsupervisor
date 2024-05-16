<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    use HasFactory;

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function connection(): HasOne
    {
        return $this->hasOne(Connection::class);
    }
}
