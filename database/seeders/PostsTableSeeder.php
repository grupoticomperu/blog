<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Post;//poner esto para crear new Post, esto se hace porque se esta usando namespace
use App\Models\Category;

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
       //Post::truncate();
       // Category::truncate();
        //Tag::truncate();

        //al activar truncate la migracion con seed falla
        //php artisan migrate:fresh --seed

        $category = new Category;
        $category->name = "Categoria 1";
        $category->save();

        $category = new Category;
        $category->name = "Categoria 2";
        $category->save();


        $post = new Post;
        $post->title= "Mi primer post";
        $post->url= Str::slug("mi primer post");  
        $post->excerpt = "esto es un resumen de mi primer post";
        $post->body = "<p> esto es un resumen de mi primer post es de mi primer post esto es un resumen de mi primer post</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id= 1;
        $post->user_id= 1;
        $post->save();
        //$post->tags()->attach(Tag::create(['name'=>'etiqueta 1']));

        $post = new Post;
        $post->title= "Mi segundo post";
        $post->url= Str::slug("mi segundo post");
        $post->excerpt = "esto es un resumen de mi segundo post";
        $post->body = "<p> esto es un resumen de mi segundo post es de mi segundo post esto es un resumen de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id= 1;
        $post->user_id= 1;
        $post->save();
        //$post->tags()->attach(Tag::create(['name'=>'etiqueta 2']));

        $post = new Post;
        $post->title= "Mi teeeeeeercer post";
        $post->url= Str::slug("mi tercer post");
        $post->excerpt = "esto es un resumen de mi tercer post";
        $post->body = "<p> esto es un resumen de mi tercer post es de mi tercer post esto es un resumen de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id= 2;
        $post->user_id= 1;
        $post->save();
       // $post->tags()->attach(Tag::create(['name'=>'etiqueta 3']));

        $post = new Post;
        $post->title= "Mi cuaaaaaaaaaarto post";
        $post->url= Str::slug("mi cuarto post");
        $post->excerpt = "esto es un resumen de mi cuarto post";
        $post->body = "<p> esto es un resumen de mi cuarto post es de mi cuarto post esto es un resumen de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id= 2;
        $post->user_id= 2;
        $post->save();
        //$post->tags()->attach(Tag::create(['name'=>'etiqueta 4']));

    }
}
