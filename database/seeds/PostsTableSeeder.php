<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=10; $i++) { 
            $newPost = new Post();
            $newPost->title = 'titolo ' . $i;
            $newPost->slug = Str::slug($newPost->title,'-');
            $newPost->content = 'Descrizione..' . $i;
            $newPost->save();
        }   
    }
}
