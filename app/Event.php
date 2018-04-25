<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    protected $appends = ['favoritesCount','isLiked'];


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('favoritesCount', function($builder){
            $builder->withCount('favorites');
        });
    }

    public function path()
    {
        return "/events/{$this->id}";
    }

// event only has 1 organiser
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function host()
    // {
    //     return $this->belongsTo(User::class, 'name');
    // }
// represents the relationship the event has many photos
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
// event can have more than 1 reply
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
// this allows other users and current to reply to the event
    public function postReply($reply)
    {
        return $this->replies()->create($reply);
    }
// filters the type of event
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function favorites()
    {
   		return $this->morphMany(Favorite::class,'favorited');
    }
// allow the user the favourite an event
    public function favorite()
    {
       $attributes = ['user_id' => auth()->id()];

       if(! $this->favorites()->where($attributes)->exists())
       {
    	   return $this->favorites()->create($attributes);
   		 }
    }
// able to take away your favourtie from the event
    public function dislike()
    {
        $attributes = ['user_id' => auth()->id()];

        $this->favorites()->where($attributes)->delete();
    }


    public function isLiked()
    {
      return $this->favorites()->where('user_id', auth()->id())->exists();
    }

    public function getisLikedAttribute()
    {
        return $this->isLiked();
    }
// count how many users have faourtited the event
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}
