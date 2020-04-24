<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Category;
use App\Post;

class SearchController extends Controller
{
    //
    public function searchUser(Request $request){ 
    	$keySearch = $request->get('keySearch') ;
    	$users = User::select('*')->where('name','LIKE','%'.$keySearch.'%')->paginate(10);
    	return view('admin.users.index',compact('users'));
    }

    public function searchCategory(Request $request){
		$keySearch = $request->get('keySearch') ;
    	$categories = Category::select('*')->where('name','LIKE','%'.$keySearch.'%')->paginate(10);
    	return view('admin.categories.index',compact('categories'));
    }

    public function searchPost(Request $request){
    	$keySearch = $request->get('keySearch') ;
    	$posts = Post::select('*')->where('title','LIKE','%'.$keySearch.'%')->paginate(10);
    	return view('admin.posts.index',compact('posts'));
    }

    public function searchFrontPost(Request $request){
    	$keySearch = $request->get('keySearch') ;
    	$posts = Post::select('*')->where('title','LIKE','%'.$keySearch.'%')->paginate(10);
    	$categories = Category::all();
    	return view('home',compact('posts','categories'));
    }

    public function fetchAutoComplete(Request $request){


    	if($request->get('keySearch') && $request->get('table') && $request->get('key')){
    			$query = $request->get('keySearch');
	    		$table = $request->get('table');
	    		$key = $request->get('key');
	    		$output = '';
	    		$datas = DB::table($table)->where($key,'LIKE','%'.$query.'%')->get();
	    		if(count($datas) > 0){
		    		$output = '<ul class="dropdown-menu" style="display:block; position:relative">';
		    		foreach($datas as $data){
		    			//Convert Obj -> Array
		    			$data = (array)$data ;
		    			$output .= '<li><a href="#">'.$data[$key].'</a></li>';
		    		}
		    		$output .=  '</ul>';
	    		}
	    		return $output ;
    	}
    		
    	
    }
}
