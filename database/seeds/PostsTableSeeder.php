<?php

use App\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
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
        $post->title = $title = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. rovident consectetur adipisicing elit. Odit expedita';
        //$post->slug = Str::slug($title);
        $post->excerpt = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident perspiciatis, aut itaque eveniet harum ducimus iure magnam voluptates iste cum quisquam. Sed voluptates quaerat, ea provident aut unde odio dolore!';
        // $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/-WjeUtNp2Tc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
        // $post->body = '<p>Body de mi primer Document</p>';
      //  $post->user_id = 1;
        $post->category_id = 1;
       // $post->published_at = Carbon::now()->subDays(4);
        $post->save();

        $post->tags()->sync([1, 2]);
        // $post->documents()->sync([1,2]);

        $post = new Post;
        $post->title = $title = 'Lorem, ipsum dolor sit amet consectetur adipisicing lit. Provident';
        // $post->slug = Str::slug($title);
        $post->excerpt = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit expedita at fugiat incidunt dicta labore doloremque, adipisci autem rerum. Eveniet ducimus quisquam molestias sunt corrupti. Molestias tenetur molestiae nemo tempora?';
        // $post->iframe ='<iframe width="560" height="315" src="https://www.youtube.com/embed/AYb0ztNNcx8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
        // $post->body  = '<p>Body de mi segundo Documento</p>';
      //  $post->user_id = 1;
        $post->category_id = 2;
       // $post->published_at = Carbon::now()->subDays(3);
        $post->save();

        $post->tags()->sync([3, 4]);
        //  $post->documents()->sync([3,4]);

    }
}
