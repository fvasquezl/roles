<?php
namespace Database\Seeders;
use App\Models\Post;
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
        //1
        $post = new Post;
        $post->title = $title = 'Publicacion Gerente IT';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion Departamento TI Role Gerente debe ser vista';
        $post->user_id = 1;
        // $post->category_id = 1;
        $post->published_at = Carbon::now()->subDays(10)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([7]);
        // $post->tags()->sync([1, 2]);
        $post->assignRole(4);

//2
        $post = new Post;
        $post->title = $title = 'Publicacion IT';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion Departamento TI sin role Debe ser vista';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(9)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([7]);
        //$post->assignRole(3);
        //  $post->tags()->sync([3, 4]);

//3
        $post = new Post;
        $post->title = $title = 'Publicacion todos los Gerentes';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion Role Gerente Debe ser vista';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(8)->format('d/m/Y');
        $post->save();
        //$post->departments()->sync([2]);
        $post->assignRole(4);
        //  $post->tags()->sync([3, 4]);

        //4
        $post = new Post;
        $post->title = $title = 'Publicacion Gerente GO';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion Departamento GO Role Gerente No debe ser vista';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(7)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([4]);
        $post->assignRole(4);
        //  $post->tags()->sync([3, 4]);
//5
        $post = new Post;
        $post->title = $title = 'Publicacion departamento GO';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion Departamento GO No debe ser vista';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(6)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([4]);
        // $post->assignRole(3);
        //  $post->tags()->sync([3, 4]);

//6
        $post = new Post;
        $post->title = $title = 'Publicacion Publica';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion SIN Departamento SIN Role debe ser vista';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(5)->format('d/m/Y');
        $post->save();
        // $post->departments()->sync([4]);
        // $post->assignRole(3);
        //  $post->tags()->sync([3, 4]);

//7
        $post = new Post;
        $post->title = $title = 'Publicacion KP';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion Departamento KH debe ser vista por Gerente IT si se convierte en Gerente de KH';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(4)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([5]);
        // $post->assignRole(3);
        //  $post->tags()->sync([3, 4]);

//8
        $post = new Post;
        $post->title = $title = 'Publicacion 1 Coordinador';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion Departamento  Coordinador de KH';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(4)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([5]);
        $post->assignRole(5);
        //  $post->tags()->sync([3, 4]);

//9
        $post = new Post;
        $post->title = $title = 'Publicacion 2 Coordinador';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion oordinador de KH';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(4)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([5]);
        $post->assignRole(5);
        //  $post->tags()->sync([3, 4]);
//10
        $post = new Post;
        $post->title = $title = 'Publicacion 3 Coordinador';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion new';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(4)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([5]);
        $post->assignRole(5);
        //  $post->tags()->sync([3, 4]);

        $post = new Post;
        $post->title = $title = 'Publicacion 4 Coordinador';
        $post->slug = Str::slug($title);
        $post->excerpt = 'Publicacion new 3';
        $post->user_id = 1;
        //$post->category_id = 2;
        $post->published_at = Carbon::now()->subDays(4)->format('d/m/Y');
        $post->save();
        $post->departments()->sync([5]);
        $post->assignRole(5);
        //  $post->tags()->sync([3, 4]);



    }

}