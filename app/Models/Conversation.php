<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Conversation extends Model
{

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }


    public function artist(): BelongsTo
    {
        return $this->belongsTo(User::class, 'artist_id');
    }


    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }
}
