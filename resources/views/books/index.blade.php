@extends('layouts.master')

@section('title')
  Index
@stop

@section('content')
    <!-- Main jumbotron for info on site -->
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">Sean's Stuff</h1>
        <p id = "header">A place to put stuff I work on when I have free time.</p>
        <p><a class="btn btn-primary btn-lg" href="/about" role="button" id = "learn">More Info &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Column of book summaries -->
      <div class="row">
        @foreach ($books as $book)
        <div class="col-md-12">
          <h2>{{$book->title}}</h2><span>by {{$book->user->name}}</span>
          <p>{{$book->synopsis}}</p>
          <p><a class="btn btn-default" href="/books/{{$book->id}}" role="button">View details &raquo;</a></p>
        </div>
        @endforeach
      </div>

      <hr>
@stop