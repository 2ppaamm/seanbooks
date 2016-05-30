<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
	    $user_id = \Foobooks\User::where('name','=','test')->pluck('id')->first();
	    DB::table('books')->insert([
	    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'title' => 'The Test',
	    'user_id' => $user_id,
	    'published' => true,
	    'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
	    'chapters' => 12,
	    ]);

	    $user_id = \Foobooks\User::where('name','=','testa')->pluck('id')->first();
	    DB::table('books')->insert([
	    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'title' => 'The Tester',
	    'user_id' => $user_id,
	    'published' => false,
	    'cover' => 'http://img1.imagesbn.com/p/9780061148514_p0_v2_s114x166.JPG',
	    'page_count' => 1234,
	    ]);
    }
}
