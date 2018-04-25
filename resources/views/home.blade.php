@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(count($events))
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">Event_Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
              <p>On this page you can see all the events you have posted and are able to update them.<p>
                @foreach($events as $event)
                <tr>
                <td><a href="{{ route('events.show', $event) }}"> {{ $event->name}} </a> </td>
                <td><a href="{{ route('events.edit', ['event' => $event] ) }}" class="text-dark" style="text-decoration:none">edit</a></td>
                <td>
                    <form action="{{ route('events.destroy', ['event' => $event] ) }}" method="POST">
                        {{method_field('DELETE')}}

                        {{csrf_field()}}
                        <a href="#" onclick="$(this).closest('form').submit()" class="text-danger"> Delete
                        </a>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            @else
            <h1 style="font-family:Comic Sans MS, cursive, sans-serif">No events, go ahead and <a href="{{ route('events.create')}} "><u>create</u></a> one!</h1>
            @endunless
        </div>
    </div>
</div>
@endsection
<div class="container">
  <div id="footer"><font color="blue">Aston Events, Copyright &copy; 2018</font></div>
</div>
