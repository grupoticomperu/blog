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
         //$posts = Post::all();
        // $posts = Post::where('user_id', auth()->id())->get();
        /// $posts = auth()->user()->posts;

        $posts = Post::allowed()->get();

       // if( auth()->user()->hasRole('Admin') )
      //  {
       //     $posts = Post::all();
           // return $query;
       // }
      //  else
      //  {
      //      $posts = auth()->user()->posts;
      // }

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

        $this->authorize('create', new Post);
   
        $this->validate($request, [
            'title' => 'required'
        ]);

        //$post = Post::create($request->only('title'));
        $post = Post::create([
            
            'title' => $request->get('title'),
            //para saber quien esta creando el post
            'user_id' => auth()->id()
        ]);

        return redirect()->route('admin.posts.edit', $post);

    }


    public function edit(Post $post){

        $this->authorize('update', $post);
       // $this->authorize('view', $post);

        $categories = Category::all();
    	  $tags = Tag::all();
    	return view('admin.posts.edit',compact('categories','tags','post'));
    }
    

    
    public function update(Post $post, StorePostRequest $request)
    {
    
        $this->authorize('update', $post);

    // return Post::create($request->all());
    //esto ejecuta y se sale
    //te da como resultado un jason    
    //dd($request->get('tags'));
        //$post = new Post;
       ///// $post->title = $request->get('title');
          // $post->url = Str::slug($request->get('title'));
       ///// $post->body = $request->get('body');
       ///// $post->iframe = $request->get('iframe');
       ///// $post->excerpt = $request->get('excerpt');

       // $post->published_at =  $request->has('published_at')?Carbon::parse($request->get('published_at')):null;
       ///// $post->published_at =  $request->get('published_at');
        //$post->category_id = $request->get('category');
       // $post->category_id = Category::find($cat = $request->get('category'))? $cat : Category::create(['name'=>$cat])->id;
       ///// $post->category_id = $request->get('category_id');

       ///// $post->save();
        ////$post->update($request->except('tags'));

        $post->update($request->all());
        $post->syncTags($request->get('tags'));

        //$tags = [];
        //foreach ($request->get('tags') as $tag) {
        //    $tags[] = Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        //}

       //$tags = collect($request->get('tags'))->map(function($tag){
        //    return Tag::find($tag) ? $tag : Tag::create(['name'=>$tag])->id;
       // });


        //$post->tags()->sync($request->get('tags'));
        //$post->tags()->sync($tags);

       // return back()->with('flash','Tu publicación fue guardada Con éxito');

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación fue guardada Con éxito');
        
    }

    public function destroy(Post $post){

      $this->authorize('delete', $post);
      
      $post->delete();

      return redirect()
      ->route('admin.posts.index')
      ->with('flash', 'La publi fue eliminada');
      
    }
    

}


