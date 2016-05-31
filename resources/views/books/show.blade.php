@extends('layouts.master')

@section('title')
  {{$book->title}}
@stop

@section('content')
        <!-- Main jumbotron for info on site -->
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">{{$book->title}}</h1>
        <p><a class="btn btn-primary btn-lg" href="/index" role="button" id = "learn">Back to Index&raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Column of book summaries -->
      <div class="row">
        <div class="col-md-4">
          <p><img id = "cover" alt = "Cover image" src = "{{$book->cover}}" /></p>
        </div>
        <div class = 'col-md-8'>
          <p>{{$book->synopsis}}</p>
        </div>
        @foreach ($chapters as $chapter)
        <div class='col-md-8'>
            <h3><a href = '/chapters/{{$chapter->id}}'>{{$chapter->name}}</a></h3>
        </div>
        @endforeach
      </div>
      <hr>
@stop