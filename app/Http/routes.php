<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/practice', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Practice';

});

Route::get('/customers',function(){
    $faker = Faker\Factory::create();

    $limit = 10;

    for ($i = 0; $i < $limit; $i++) {
        $faker->name . ', Email Address: ' . $faker->unique()->email . ', Contact No' . $faker->phoneNumber . '<br>';
    }
});

Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback');

Route::get('/logout', function() {
    Auth::logout();
    return Redirect::home();
});

/*
* Book Routes
*/
Route::get('books/create', 'BookController@getCreate');
Route::post('books/create', 'BookController@postCreate');
Route::get('books/add', 'BookController@getAdd');
Route::post('books/add', 'BookController@postAdd');
Route::get('books/{id}', 'BookController@getBook');

Route::get('chapters/{id}', 'BookController@getChapter');

/*
* Navigation Bar
*/
Route::get('about', 'BookController@getAbout');
Route::get('index', 'BookController@getIndex');
Route::get('/', 'BookController@getIndex');

Route::resource('tag', 'TagController');


/*
* Login routes
*/
# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@logout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

# Process logout
Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});