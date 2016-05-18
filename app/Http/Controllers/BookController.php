<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;

class BookController extends Controller
{
    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        return view('books.index');
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
	public function getShow($title = null) {
    	return view('books.show')->with('title', $title);
	}

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
        return 'Form to create a new book';
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postCreate() {
        return 'Process adding new book';
    }
}
