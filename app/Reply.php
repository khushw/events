<?php

namespace App;

use App\Reply;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
   protected $guarded = [];

   protected $appends = ['favoritesCount','isLiked'];
   protected $with = ['owner'];

   protected static function boot()
   {
       parent::boot();

       static::deleting(function($reply) { // before delete() method call this
           $reply->favorites()->delete();
      });
   }
// allows us to fund out which user commented on the post
   public function owner()
   {
   		return $this->belongsTo(User::class, 'user_id');
   }
// this methods shows that the reply belings to which event
   public function event()
   {
      return $this->belongsTo(Event::class);
   }

   public function favorites()
   {
   		return $this->morphMany(Favorite::class,'favorited');
   }

   public function favorite()
   {
       $attributes = ['user_id' => auth()->id()];

       if(! $this->favorites()->where($attributes)->exists())
       {
    	   return $this->favorites()->create($attributes);
   		 }
    }
// allows the user to unlike thir favourite
    public function dislike()
    {
        $attributes = ['user_id' => auth()->id()];

        $this->favorites()->where($attributes)->delete();

    }

    public function getisLikedAttribute()
    {
        return $this->isLiked();
    }
// whether the event is liked or not
    public function isLiked()
    {
      return $this->favorites()->where('user_id', auth()->id())->exists();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}
