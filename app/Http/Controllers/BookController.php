<?php

namespace Foobooks\Http\Controllers;

use Illuminate\Http\Request;

use Foobooks\Http\Requests;
use Foobooks\Http\Requests\CreateBookRequest;
use Foobooks\Book;

use Foobooks\Chapter;
use Foobooks\User;

use Illuminate\Auth\AuthManager;
use Auth0;
use Auth;

use DB;

class BookController extends Controller
{
    public function __construct()
    {
    	Auth::login(User::find(1));
// 		$this->middleware('auth0.jwt');
    }
    /**
    * Responds to requests to GET /index
    */
    public function getIndex() {
    	$user = Auth::user();
    	if($user) {
    	}
   		$books = Book::with('author')->wherePrivate(False)->get();
   		$mybooks = $user->books;
    	return response()->json(['user'=>$user,'books'=>$books, 'mybooks'=>$mybooks],200);
//        return view('books.index')->with(compact('books'));
    }

    public function getAbout() {
    	return view('books.about');
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
	public function getBook($id = null) {
		$book = Book::whereId($id)->with('chapters')->get();
    	return response()->json(['book'=>$book],200);
//    	return view('books.show')->with(compact('book', 'chapters'));
	}

	public function getChapter($id = null) {
		$chapter = Chapter::whereId($id)->first();
    	return view('books.chapter')->with(compact('chapter'));
    	return response()->json(['book'=>$book],200);
	}

    /**
     * Responds to requests to GET /books/create
     */
/*    public function getCreate() {
        if(!\Auth::check()) {
        	\Session::flash('message', 'You have to be logged in to create a new book');
        	return redirect('/login');
        }
        return view('books.create');
    }
*/
	/**
	 * Responds to requests to POST /books/create
	 */
	public function postCreate(CreateBookRequest $request) {

	    // If the code makes it here, you can assume the validation passed
	    $title = $request->input('title');
	    $cover = $request->input('cover');
	    $synopsis = $request->input('synopsis');

	    if (!$cover){
	    	$cover = 'http://vignette3.wikia.nocookie.net/spore/images/6/6c/Question-mark.png/revision/latest?cb=20110427230528';
	    }

		if (!$synopsis){
			$synopsis = "None";
		}
	    // Code would go here to add the book to the database
	    $book = Book::updateOrCreate(
	    		['title' => $title, 
	    		'cover' => $cover,
	    		'synopsis' => $synopsis,
	    		'user_id' => Auth::user()->id
	    		]
	    );

	    // Then you'd give the user some sort of confirmation:
    	return response()->json(['book'=>$book],200);
	}

    public function getAdd() {
        if(!\Auth::check()) {
        	\Session::flash('message', 'You have to be logged in to add a new chapter');
        	return redirect('/login');
        }

	    $userid = Auth::user()->id;
	    $books = Book::where('user_id', '=', $userid)->get();	
        return view('books.add')->with(compact('books'));
    }

    /**
	 * Responds to requests to POST /books/create
	 */
	public function postAdd(Request $request) {

	    // Validate the request data
	    $this->validate($request, [
	        'booktitle' => 'required|min:3',
	        'chaptertitle' => 'required|min:1',
	        'content'	=> 'required|min:50',
	    ]);
	    
	    // If the code makes it here, you can assume the validation passed
	    $booktitle = $request->input('booktitle');
	    $chaptertitle = $request->input('chaptertitle');
	    $content = $request->input('content');
	    // Code would go here to add the book to the database
	    $book_id = DB::table('books')->where('title', '=', $booktitle)->first()->id;
	    DB::table('chapters')->insert(
	    		['name' => $chaptertitle,
	    		'content' => $content,
	    		'book_id' => $book_id
	    		]
	    );

	    // Then you'd give the user some sort of confirmation:
	    return redirect('/books/' . $book_id);
	}
}	