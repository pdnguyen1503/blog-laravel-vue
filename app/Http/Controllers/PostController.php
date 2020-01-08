<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;


class PostController extends Controller
{
    public function allPost(){
    	$posts  = Post::with('category', 'user')->get();
    	$categories  = Category::with('posts')->get();
    	dd($categories);
    	return $posts;
    }

}
