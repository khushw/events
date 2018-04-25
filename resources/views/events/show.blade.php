
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

        <!-- Carousel -->
            <div class="col-md-8">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- The slideshow -->
                    <div class="carousel-inner">

                        <!-- Thumbnail -->
                        <div class="carousel-item active">
                            <img src="{{ url('/photos/' .$event->thumbnail_path) }}" width="100%">
                            <!-- <img src="{{ $event->thumbnail_path }}" width="100%"> -->
                        </div>

                        <!-- Photos associated with the event -->
                        @foreach($event->photos as $photo)
                        <div class="carousel-item">
                            <img src="{{ url('/photos/' .$photo->path) }}" width="100%">
                            <!-- <img src="{{ $photo->path }}" width="100%"> -->
                            @can('update', $event)
                            <div class="carousel-caption">
                                <form action="{{ route('photos.destroy', $photo) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">remove</button>
                                </form>
                            </div>
                            @endcan
                        </div>
                        @endforeach
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>

                <h3 class="mt-3" style="font-family:Comic Sans MS, cursive, sans-serif"><p>Comments</p></h3>
                <hr />

                <!-- Replies -->
                <replies :data=" {{ $event->replies }}"></replies>

            </div>
            <!-- Event Information -->
            <div class="col-md-4 p-3">
                <div class="card bg-light mb-3 border border-dark" >
                    <div class="card-header border border-dark"><strong>Event Type:</strong>{{ $event->type }}</div>
                    <div class="card-body">
                        <p class="card-title"><strong>Event Title:</strong>{{ $event->name }}</p>
                        <p class="card-text"><strong>Event Description:</strong>  {{ $event->description }}</p>
                        <p class="card-text"><strong>Event Date:</strong>  {{ $event->due_date }}</p>
                        <p class="card-text"><strong>Event Time:</strong>  {{ $event->time }}</p>
                        <p class="card-text"><strong>Event Contact:</strong>{{ $event->contact }}</p>
                        <b>Email:</b>
                        <a href="mailto: {{$event->email}}"> <p class="card-text">{{ $event->email }}</p></a>
                        <!-- <p class="card-text">{{ $event->host}}</p> -->
                        <!-- <a href="mailto:{{ $event->creator }}">Contact me</a> -->
                        @auth <favorite :event ="{{ $event }}"></favorite> @endauth
                    </div>
                </div>
                @can('update', $event)
                <div class="card bg-light mb-3">
                    <div class="card-header border border-dark">Upload photos</div>
                    <div class="card-body border border-dark">
                        <form action="{{ route('photos.store', $event) }}" method="POST" class="form-group" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-control">
                                <input name="photos[]"  type="file" multiple required/>
                            </div>
                            <input type="submit" class="btn btn-default mt-2" value="Upload" />
                        </form>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
