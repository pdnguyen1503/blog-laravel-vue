<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Image;
use Illuminate\Http\UploadedFile;
use Auth;
class PostController extends Controller
{
	/**
	 * get adll post
	 */
    public function getAllPost(){
    	$posts  = Post::with('category', 'user')->orderBy('id', 'desc')->get();
    	return response()->json([
			'message' => 'get all post success',
			'posts'=>$posts
		], 200);
    }

	/**
	 * function to add new post
	 */
	public function postAddPost(Request $request){
		$this->validate($request, [
			'title' => 'required|min:3',
			'description' => 'required'
		]);
		$strpos = strpos($request->photo, ';');
		$sub = substr($request->photo, 0, $strpos);
		$ex = explode('/',$sub)[1]; // get type file 
		$name = time().".".$ex;
		$image = Image::make($request->photo)->resize(300,200);
		$upload_path = public_path()."/storage/images/";
		$image->save($upload_path.$name);
		$post = new Post();
		$post->cat_id = $request->cat_id;
		$post->user_id = Auth::user()->id;
		$post->title = $request->title;
		$post->description = $request->description;
		$post->photo = $name;
		$post->comment_id = null;
		$post->save();
		return response()->json([
			'message' => 'Create new post success',
			'post' => $post,
		]);

	}

	public function deletePost($id){
		$post = Post::find($id);
		$image_path = public_path()."/storage/images/";
		$image = $image_path.$post->photo;
		if(file_exists($image)){
			@unlink($image);
		}
		$post->delete();
	}

	public function editpost($id){
		$post = Post::find($id);
		return response()->json([
			'message' => 'get success post',
			'post' =>$post
		],200);
	}

	public function postEditPost(Request $request, $id){
		$this->validate($request, [
			'title' => 'required|min:3',
			'description' => 'required'
		]);
		$post = Post::find($id);
		if($request->photo!= $post->photo){
			$strpos = strpos($request->photo, ';');
			$sub = substr($request->photo, 0, $strpos);
			$ex = explode('/',$sub)[1]; // get type file 
			$name = time().".".$ex;
			$img = Image::make($request->photo)->resize(300,200);
			$upload_path = public_path()."/storage/images/";
			$image = $upload_path.$post->photo;
			$img->save($upload_path.$name);
			if(file_exists($image)){
				@unlink($image);
			}
		}else{
			$name = $post->photo;
		}
		$post->cat_id = $request->cat_id;
		$post->user_id = Auth::user()->id;
		$post->title = $request->title;
		$post->description = $request->description;
		$post->photo = $name;
		$post->comment_id = null;
		$post->update();
		return response()->json([
			'message' => 'update post success',
			'post' => $post,
		]);
	}

}