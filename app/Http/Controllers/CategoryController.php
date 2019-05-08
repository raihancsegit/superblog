<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
class CategoryController extends Controller
{
    public function add_category(Request $request){
        //return $request->all();
        $this->validate($request,[
            'cat_name' => 'required|min:2|max:50'
        ]);
        $category = new category();
        $category->cat_name = $request->cat_name;
        $category->save();
        return ['message'=>'successfully'];
    }

    public function all_category(){
        $categories = category::all();
        return response()->json([
            'categories'=>$categories
        ],200);
    }
    public function delete_category($id){
        $categories = category::find($id);
        $categories->delete();
        
    }
    public function edit_category($id){
        $category = category::find($id);
        return response()->json([
            'category'=>$category
        ],200);
        
    }
    public function update_category(Request $request,$id){
        $this->validate($request,[
            'cat_name' => 'required|min:2|max:50'
        ]);
        $category = category::find($id);
        $category->cat_name = $request->cat_name;
        $category->save();
        
    }


}
