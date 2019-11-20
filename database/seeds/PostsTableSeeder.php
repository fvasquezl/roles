<?php

use App\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $post = new Post;
        $post->title = 'Mi primer Documento';
        $post->excerpt = 'Extracto de mi primer Documento';
       // $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/-WjeUtNp2Tc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
       // $post->body = '<p>Body de mi primer Document</p>';
        $post->user_id = 1;
        $post->published_at =Carbon::now()->subDays(4);
        $post->save();
        $post->categories()->sync([1,2]);

        $post = new Post;
        $post->title = 'Mi segundo Documento';
        $post->excerpt = 'Extracto de mi segundo Documento';
       // $post->iframe ='<iframe width="560" height="315" src="https://www.youtube.com/embed/AYb0ztNNcx8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
       // $post->body  = '<p>Body de mi segundo Documento</p>';
        $post->user_id = 1;
        $post->published_at = Carbon::now()->subDays(3);
        $post->save();
        $post->categories()->sync([2,3]);
        
        $post = new Post;
        $post->title = 'Mi Tercer Documento';
        $post->excerpt = 'Extracto de mi Tercer Documento';
      //  $post->body = '<p>Body de mi Tercer Documento</p>';
        $post->user_id = 1;
        $post->published_at =Carbon::now()->subDays(2);
        $post->save();
        $post->categories()->sync([1,2,3]);
        
        $post = new Post;
        $post->title = 'Mi Cuarto Documento';
        $post->excerpt = 'Extracto de mi Cuarto Documento';
      //  $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/a6jRKEioRkk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
       // $post->body = '<p>Body de mi Cuarto Documento</p>';
        $post->user_id = 1;
        $post->published_at = Carbon::now()->subDays(1);
        $post->save();
        $post->categories()->sync([5,3]);
        
        $post = new Post;
        $post->title = 'Mi Quinto Documento';
        $post->excerpt = 'Extracto de mi Quinto Documento';
      //  $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/TE4uQZ04uxw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
       // $post->body = '<p>Body de mi Cuarto Documento</p>';
        $post->user_id = 1;
        $post->published_at = Carbon::now()->subDays(1);
        $post->save();
        $post->categories()->sync([1,3,5]);
        
        $post = new Post;
        $post->title = 'Mi Sexto Documento';
        $post->excerpt = 'Extracto de mi Sexto Documento';
       // $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/V7OP5E5XI3M" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
       // $post->body = '<p>Body de mi Cuarto Documento</p>';
        $post->user_id = 1;
        $post->published_at = Carbon::now()->subDays(1);
        $post->save();
        $post->categories()->sync([2,4,5]); 
    }
}
