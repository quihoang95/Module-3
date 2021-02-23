<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::all();
        return view('admin.categories.list',compact('categories'));
    }
    function getPostByCategoryId($id){
        $post = Category::findOrFail($id)->posts()->first();
        dd($post->category->name);
    }
}
