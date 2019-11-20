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
        $post->title = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. rovident consectetur adipisicing elit. Odit expedita';
        $post->excerpt = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident perspiciatis, aut itaque eveniet harum ducimus iure magnam voluptates iste cum quisquam. Sed voluptates quaerat, ea provident aut unde odio dolore!';
       // $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/-WjeUtNp2Tc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
       // $post->body = '<p>Body de mi primer Document</p>';
        $post->user_id = 1;
        $post->published_at =Carbon::now()->subDays(4);
        $post->save();
        $post->categories()->sync([1,2]);
        $post->documents()->sync([1,2]);

        $post = new Post;
        $post->title = 'Lorem, ipsum dolor sit amet consectetur adipisicing lit. Provident';
        $post->excerpt = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit expedita at fugiat incidunt dicta labore doloremque, adipisci autem rerum. Eveniet ducimus quisquam molestias sunt corrupti. Molestias tenetur molestiae nemo tempora?';
       // $post->iframe ='<iframe width="560" height="315" src="https://www.youtube.com/embed/AYb0ztNNcx8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
       // $post->body  = '<p>Body de mi segundo Documento</p>';
        $post->user_id = 1;
        $post->published_at = Carbon::now()->subDays(3);
        $post->save();
        $post->categories()->sync([2,3]);
        $post->documents()->sync([3,4]);

        $post = new Post;
        $post->title = 'Lorem, ipsum dolor sit amet consectetur adiisicing elit. Provident';
        $post->excerpt = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quibusdam ut voluptas fuga incidunt sapiente nostrum atque, libero, ipsum dolorem sint sed reiciendis optio, minima molestias id dolor nulla minus.';
      //  $post->body = '<p>Body de mi Tercer Documento</p>';
        $post->user_id = 1;
        $post->published_at =Carbon::now()->subDays(2);
        $post->save();
        $post->categories()->sync([1,2,3]);
        $post->documents()->sync([5,6]);
        
        $post = new Post;
        $post->title = 'Lorem, ipsum dolor sit amet consctetur adipisicing elit. Provident';
        $post->excerpt = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, molestiae. Officia quisquam unde magnam error, iusto tempora aperiam soluta expedita sapiente veritatis quod distinctio optio accusantium non, voluptates alias magni.';
      //  $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/a6jRKEioRkk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
       // $post->body = '<p>Body de mi Cuarto Documento</p>';
        $post->user_id = 1;
        $post->published_at = Carbon::now()->subDays(1);
        $post->save();
        $post->categories()->sync([5,3]);
        $post->documents()->sync([7]);
        
        $post = new Post;
        $post->title = 'Lorem, ipsum dolor sit aet consectetur adipisicing elit. Provident';
        $post->excerpt = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum reprehenderit nisi distinctio consequuntur fuga tempore ratione error itaque, in perspiciatis velit nulla eveniet quod nam amet, necessitatibus adipisci voluptates voluptatem.';
      //  $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/TE4uQZ04uxw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
       // $post->body = '<p>Body de mi Cuarto Documento</p>';
        $post->user_id = 1;
        $post->published_at = Carbon::now()->subDays(1);
        $post->save();
        $post->categories()->sync([1,3,5]);
        $post->documents()->sync([8]);

        $post = new Post;
        $post->title = 'Lorem, ipsum door sit amet consectetur adipisicing elit. Provident';
        $post->excerpt = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quisquam laboriosam error quasi consequatur est labore illum, et asperiores dicta tempora a molestiae consectetur aliquam nulla. Delectus, dolore? Laborum, impedit.';
       // $post->iframe = '<iframe width="560" height="315" src="https://www.youtube.com/embed/V7OP5E5XI3M" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
       // $post->body = '<p>Body de mi Cuarto Documento</p>';
        $post->user_id = 1;
        $post->published_at = Carbon::now()->subDays(1);
        $post->save();
        $post->categories()->sync([2,4,5]); 
        $post->documents()->sync([9,10]);
    }
}
