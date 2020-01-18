<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Database\Eloquent\Collection;
// use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function addCategory(Request $request){;
        $this->validate($request,
            [
                'cat_name' => 'required|min:5',
            ],
            [
                'cat_name.required'=>'Name of category empty',
                'cat_name.min' => 'Min character is 5'
            ]);
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->save();
        return response()->json([
            'message' => 'add catefory success'
        ],200);
    }
    
    public function getAllCategory(){
        $categories = Category::all();
        return response()->json([
            'message'=> 'Success get all categories',
            'categories' => $categories,
        ], 200);
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'message' => 'delete category success'
        ],200);
    }

    public function getEditCategory($id){
        $category = Category::find($id);
        return response()->json([
            'message' => 'get edit success',
            'category' => $category
        ],200);
    }

    public function postEditCategory(Request $request, $id){
        $this->validate($request,
            [
                'cat_name' => 'required|min:5',
            ],
            [
                'cat_name.required'=>'Name of category empty',
                'cat_name.min' => 'Min character is 5'
            ]);
        $category = Category::find($id);
        $category->cat_name = $request->cat_name;
        $category->update();
        return response()->json([
            'message' => 'get edit success',
            'category' => $category
        ],200);
    }
}
