<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function getAllPost(){
    	$posts  = Post::with('category', 'user')->get();
    	return response()->json([
			'message' => 'get all post success',
			'posts'=>$posts
		], 200);
    }

}