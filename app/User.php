<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
// shows you can have mulitple events
    public function events()
    {
        return $this->hasMany(Event::class);
    }
// class relationship shows that you can have multiple likes

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
