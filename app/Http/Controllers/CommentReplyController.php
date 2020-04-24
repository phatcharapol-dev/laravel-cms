<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommentReply;
use App\Http\Requests\ReplyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replies = CommentReply::all();
        return view('admin.comments.replies.index',compact('replies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReplyRequest $request)
    {
        //
        $input = $request->all();
        CommentReply::create([
            'comment_id' => $input['comment_id'],
            'body' => $input['body'],
            'email' => Auth::user()->email,
            'author' => Auth::user()->name,
            'photo' => Auth::user()->photo->file,
            'is_active' => 1
        ]);

        Session::flash('message','Your message has been submited !');
        Session::flash('alert-class','alert alert-success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $reply = CommentReply::findOrFail($id);
        $reply->update($request->all());
        return redirect(route('admin.replies.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = CommentReply::findOrFail($id);
        $reply->delete();
        Session::flash('message','The reply has been deleted !');
        Session::flash('alert-class','alert alert-danger');
        return redirect(route('admin.replies.index'));
    }
}
