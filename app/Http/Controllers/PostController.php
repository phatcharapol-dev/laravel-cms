<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    //
    public function index(){
    	$posts = Post::paginate(5);
        $categories = Category::all();
        return view('home',compact('posts','categories'));
    }

    public function show($slug){
    	$post = Post::findBySlugOrFail($slug);
        $categories = Category::all();
        return view('post',compact('post','categories'));
    }

    public function searchPostByCategory($slug){
        $category = Category::findBySlugOrFail($slug);
        $categories = Category::all();
        $posts = $category->posts()->paginate(5) ;
        return view('home',compact('posts','categories'));
    }
}
