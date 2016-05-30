@extends('layouts.master')

@section('title')
    Add New Chapter
@stop

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">Add New Chapter</h1>
      </div>
    </div>

    <div class="container">
      <!-- Column of book summaries -->
      <div class="row">
        <div class="col-md-12">
          @if($errors->get('booktitle'))
              <ul>  
                  @foreach($errors->get('booktitle') as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif
          <div class = "col-md-6">
            <form method='POST' action='/books/add'>
                <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                <div class = 'form-group'>
                    <label for='booktitle'>Book Title</label>
                    <br />
                    <input name = 'booktitle' list = 'booktitle' class = 'form-control'>
                    <datalist id = 'booktitle'>
                      @foreach ($books as $book)
                        <option value = '{{$book->title}}'>
                      @endforeach
                    </datalist>
                </div>
                
                @if($errors->get('chaptertitle'))
                    <ul>  
                        @foreach($errors->get('chaptertitle') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class='form-group'>
                      <label for='chaptertitle'>Chapter Title</label>
                      <input name='chaptertitle' class = 'form-control' type='text'>
                </div>

                @if($errors->get('content'))
                    <ul>  
                        @foreach($errors->get('content') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class='form-group'>
                      <label for='content'>Content</label>
                      <input name='content' class = 'form-control' type='text'>
                </div>
                <input type='submit' value='Submit'>
            </form>
          </div>        
        </div>
      </div>

      <hr>
@stop