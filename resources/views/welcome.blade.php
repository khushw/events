@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="Website for events at Aston">
  <meta name="keywords" content="events at aston, Aston Events, event organising">
  <meta name="author" content="khushdeep Walia">
  <link rel="stylesheet" href="./sass/app.scss">
</head>
<body>
  <header>
    <img src="./photos/aston.png" id="pic" style="width:200px;height:200px;">
  </header>

  <section id="showcase">
    <div class="container">
      <h1>Welcome!</h1>
      <p>On this website you are able to view events and of you would like to post any events you can also do so. Becoming an event Organiser is easy all you have to do is Sign Up and you can post any event you wish.</p>
    </div>
  </section>

  <section id="boxes">
    <div class="container">
      <div class="box">
        <img src="./photos/Culture.png" id="pic">
          <h3><a class="nav-link" href="/events/type/culture">Culture</a></h3>
        <p> Here you can see all the differnet cultres events that are hosted in the event. You can choose the filter tab and select Culture Events to view all the culture events.</p>
      </div>
      <div class="box">
        <img src="./photos/Sports.png" id="pic">
        <h3><a class="nav-link" href="/events/type/sport">Sport</a></h3>
        <p> Here you can see all the differnet sports events that are hosted in the event. You can click on the filter tab above and select the Sports Events to view all the sports related events.</p>
      </div>
      <div class="box">
        <img src="./photos/Other.png">
        <h3><a class="nav-link" href="/events/type/other">Other</a></h3>
        <p> Here you can see all the differnet events that are hosted in the event.Click on the filter tab and select the Other Events to view all the other events.</p>
      </div>
    <div>
  </section>

  <div class="container">
    <div id="footer"><font color="blue">Aston Events, Copyright &copy; 2018</font></div>
  </div>
</body>
</html>

@endsection
