<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Alexandre Denys';
        $user->email = 'alexandre.denys@orange.fr';
        $user->password = Hash::make('password');
        $user->save();

        for($i = 0; $i<4; $i++){
            $post =  new Post;
            $post->title = "Mon article ".$i;
            $post->slug = "mon-article-".$i;
            $post->user_id = $user->id;
            $post->save();
        }
        // \App\Models\User::factory(10)->create();
    }
}
