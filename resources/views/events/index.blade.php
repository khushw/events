@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            @foreach($events as $event)

            <div class="col-md-4 p-3">
                <a href="{{ $event->path() }}">
                    <div class="card bg-default text-dark  border border-dark" style="font-family:Comic Sans MS, cursive, sans-serif">
                        <img class="card-img border border-dark" src="{{ url('/photos/' .$event->thumbnail_path) }}" style="opacity:1.5;">
                        <!-- <img class="card-img" src="{{ $event->thumbnail_path }}" style="opacity:1.5;"> -->
                        <div class="card-body">
                            <h5 class="card-title">Event Name: {{ $event->name }}</h5>
                            <p class="card-text"> <strong> Event Location:</strong> {{ $event->venue }}</p>
                            <p class="card-text"><strong> Event Category:</strong> {{ $event->type }}</p>
                            <p class="card-text"> <strong> Total Likes: </strong>{{ $event->favorites_count }}</p>
                        </div>
                    </div>
                </a>
            </div>

            @endforeach

        </div>

        {{$events->links()}}

    </div>

@endsection
