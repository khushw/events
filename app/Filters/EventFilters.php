<?php

namespace App\Filters;

use App\User;
use Carbon\Carbon;

class EventFilters extends Filters
{
	protected $filters = ['by','mostLiked', 'past_events','nextup_events'];

	// this function filters the events, so the user is presented with next up coming event
	protected function nextup_events()
	{	$this->builder->getQuery()->orders = [];
		return $this->builder->where('due_date', '>', Carbon::now());}

// this filters the event which have already passt
	protected function past_events()
	{$this->builder->getQuery()->orders = [];
		return $this->builder->where('due_date', '<', Carbon::now());}

	// this functions filters the event tat has the most likes first.
		protected function mostLiked()
		{$this->builder->getQuery()->orders = [];
			return $this->builder->orderBy('favorites_count','desc');}

			protected function by($username)
			{$user = User::where('name', $username)->firstOrFail();
				return $this->builder->where('user_id' , $user->id);}
}
