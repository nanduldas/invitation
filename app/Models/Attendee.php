<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'event'
    ];

    protected $casts = [
        'event' => 'string'
    ];

    public function scopeForEvent($query, $event)
    {
        return $query->where('event', $event);
    }
}
