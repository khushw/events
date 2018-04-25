@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">

            <h1><b>Post event</b></h1>

            <hr />

            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Event Name..." required>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="description" rows="4" placeholder="Event Discription..." required></textarea>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control"  name= "due_date" placeholder="Event Date..." required>
                </div>

                <div class="form-group">
                    <input type="time" class="form-control"  placeholder="Event Time..."name= "time" required>
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" name="contact" placeholder="Event Organiser Number..." required>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Event Organiser Email..." required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="venue" placeholder="Event Location..." required>
                </div>

                <div class="form-group">
                    <label for="exampleSelect2"></label>
                    <select class="form-control" name="type" required>
                    <option value="">Event Category...</option>
                    <option>sport</option>
                    <option>culture</option>
                    <option>other</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="file" class="form-control" name="thumbnail_path" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </form>

            <!-- Errors -->
            @if(count($errors))
                <ol class ="text-center p-2">
                    @foreach($errors->all() as $error)
                        <p style='color:red'>{{$error}}</p>
                    @endforeach
                </ol>
            @endif

        </div>
    </div>
</div>

@endsection
<div class="container">
  <div id="footer"><font color="blue">Aston Events, Copyright &copy; 2018</font></div>
</div>
