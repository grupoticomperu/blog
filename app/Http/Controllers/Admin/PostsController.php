<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostRequest;


class PostsController extends Controller
{
    public function index()
    {
         $posts = Post::all();
         return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
    	$categories = Category::all();
    	$tags = Tag::all();
    	return view('admin.posts.create',compact('categories','tags'));
    }



    public function store(Request $request)
    {
   
        $this->validate($request, [
            'title' => 'required'
        ]);

        $post = Post::create($request->only('title')
           // [
           //'title' => $request->get('title'),
            //'url' => str::slug($request->get('title'))
           // ]
         );

        return redirect()->route('admin.posts.edit', $post);

    }


    public function edit(Post $post){
        $categories = Category::all();
    	$tags = Tag::all();
    	return view('admin.posts.edit',compact('categories','tags','post'));
    }

   public function update(Post $post, StorePostRequest $request)
    {
   

    // return Post::create($request->all());
    //esto ejecuta y se sale
    //te da como resultado un jason    
    //dd($request->get('tags'));
        //$post = new Post;
        $post->title = $request->get('title');
       // $post->url = Str::slug($request->get('title'));
        $post->body = $request->get('body');
        $post->iframe = $request->get('iframe');
        $post->excerpt = $request->get('excerpt');

       // $post->published_at =  $request->has('published_at')?Carbon::parse($request->get('published_at')):null;
        $post->published_at =  $request->get('published_at');
        //$post->category_id = $request->get('category');
       // $post->category_id = Category::find($cat = $request->get('category'))? $cat : Category::create(['name'=>$cat])->id;
        $post->category_id = $request->get('category');

        $post->save();


        //$tags = [];
        //foreach ($request->get('tags') as $tag) {
        //    $tags[] = Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        //}

        $tags = collect($request->get('tags'))->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name'=>$tag])->id;
        });




        //$post->tags()->sync($request->get('tags'));
        $post->tags()->sync($tags);

       // return back()->with('flash','Tu publicación fue guardada Con éxito');

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación fue guardada Con éxito');
        
    }

}

