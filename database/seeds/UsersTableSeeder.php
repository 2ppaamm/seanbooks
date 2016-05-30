<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
        'name'      => 'testa',
        'email'      => 'testa@test.com',
        'password'   => Hash::make('testa'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        ]);

        DB::table('users')->insert([
        'name'      => 'test',
        'email'      => 'test@test.com',
        'password'   => Hash::make('test'),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        ]);
    }
}
