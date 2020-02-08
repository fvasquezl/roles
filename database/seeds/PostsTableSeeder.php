<?php

use App\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');

        $post = new Post;
        $post->title = $title = 'Publicacion Secretaria';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident perspiciatis, aut itaque eveniet harum ducimus iure magnam voluptates iste cum quisquam. Sed voluptates quaerat, ea provident aut unde odio dolore!';
        $post->user_id = 1;
       // $post->category_id = 1;
        $post->published_at = Carbon::now()->subDays(5)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([2]);
       // $post->tags()->sync([1, 2]);
        $post->assignRole(4);


        $post = new Post;
        $post->title = $title = 'Publicacion Programador';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit expedita at fugiat incidunt dicta labore doloremque, adipisci autem rerum. Eveniet ducimus quisquam molestias sunt corrupti. Molestias tenetur molestiae nemo tempora?';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(4)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([2]);
        $post->assignRole(3);
      //  $post->tags()->sync([3, 4]);

    }
}
