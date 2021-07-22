<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagsController extends Controller
{
    //
    public function show(Tag $tag)
    {
    	return view('welcome',[
    		//'tag' => $tag,
    		'title' => "Publicaciones de la etiqueta:  $tag->name ",
    		'posts'=>$tag->posts()->paginate(3)]
    	);

    	
    }
}
