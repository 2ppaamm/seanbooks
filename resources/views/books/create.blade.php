@extends('layouts.master')

@section('title')
    submit
@stop

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">Submit</h1>
        <p><a class="btn btn-primary btn-lg" href="about.php" role="button" id = "learn">More Info &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Column of book summaries -->
      <div class="row">
        <div class="col-md-12">
          @if($errors->get('title'))
              <ul>
                  @foreach($errors->get('title') as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif

          <form method='POST' action='/books/create'>
              <input type='hidden' name='_token' value='{{ csrf_token() }}'>
              <input type='text' name='title'>
              <input type='submit' value='Submit'>
          </form>        
        </div>
      </div>

      <hr>
@stop