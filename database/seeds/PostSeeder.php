<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
        	'user_id' => 2,
        	'title' => 'First Post',
        	'body' => 'Lorem ipsum dolar sit amet.'
        ]);
    }
}
