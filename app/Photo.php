<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];

// shows the relationship that a certaom picture belongs to a particular event
    public function events()
    {
        return $this->belongsTo(Event::class);
    }
}
