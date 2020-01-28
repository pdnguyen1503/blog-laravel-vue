<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getAllBlogPost(){
        $blogPosts = Post::with('user', 'category')->orderBy('id', 'desc')->get();
        return response()->json([
            'blogPosts'=>$blogPosts
        ]);
    }
}
