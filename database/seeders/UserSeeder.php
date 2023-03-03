<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create()->each(function($user){
            $user->posts()->saveMany(Post::factory(1)->make());
            $user->comments()->saveMany(Comment::factory(1)->make());
            //$user->posts(Post::factory(1)->make());
        });
    }
}
