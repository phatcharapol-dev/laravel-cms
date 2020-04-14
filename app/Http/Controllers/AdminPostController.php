<?php

namespace App\Http\Controllers;

use App\Post;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostEditRequest;
use Illuminate\Support\Facades\Session;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $input = $request->all();
        $photo_id = 0 ;
        if($file = $request->file('photo')){
            $filename = time().$file->getClientOriginalName();
            $file->move('images/post_photo',$filename);
            $photo=Photo::create([
                'file'=>$filename
            ]);
            $photo_id = $photo->id;
        }
        Post::create([
            'category_id' => $input['category_id'],
            'user_id' => Auth::user()->id,
            'photo_id' => $photo_id,
            'title' => $input['title'],
            'body' => $input['body']
        ]);

        Session::flash('message','The post has been created !');
        Session::flash('alert-class','alert alert-info');
       
        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id');
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo')){
            //Delete Old Img
            if($post->photo && file_exists(public_path().'/images/post_photo/'.$post->photo->file)){
                unlink(public_path().'/images/post_photo/'.$post->photo->file);
            }
            //Add New Img
            $filename = time().$file->getClientOriginalName();
            $file->move('images/post_photo',$filename);
            $photo = Photo::create(['file'=>$filename]);
            $input['photo_id'] = $photo->id;
        }
        $post->update($input);
        Session::flash('message','The post has been updated !');
        Session::flash('alert-class','alert alert-success');
        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id) ;
        if($post->photo && file_exists(public_path().'/images/post_photo/'.$post->photo->file)){
            unlink(public_path().'/images/post_photo/'.$post->photo->file);
        }
        $post->delete();
        Session::flash('message','The post has been deleted !');
        Session::flash('alert-class','alert alert-danger');
        return redirect(route('admin.posts.index'));
    }

    public function post($id){
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post',compact('post','categories'));
    }
}
