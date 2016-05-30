@extends('layouts.master')

@section('title')
    Create new Book
@stop

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">Submit New Book</h1>
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
          <div class = "col-md-6">
            <form method='POST' action='/books/create'>
                <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                <div class = 'form-group'>
                    <label for='title'>Title*</label>
                    <input type='text' name='title' class = 'form-control'>
                </div>
                <div class='form-group'>
                      <label for='cover'>Cover image link</label>
                      <input type='text' name='cover' class = 'form-control'>
                </div>
                <div class='form-group'>
                      <label for='synopsis'>Synopsis</label>
                      <input name='synopsis' class = 'form-control' type='text'>
                </div>
                <input type='submit' value='Submit'>
            </form>
          </div>        
        </div>
      </div>

      <hr>
@stop