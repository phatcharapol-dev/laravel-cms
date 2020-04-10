<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','id')->all();
        $status = array('0'=>'Not Active','1'=>'Active');
        return view('admin.users.create',compact('roles','status')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input= $request->all();
        $photo_id = 0 ;
        if($file = $request->file('photo')){
            $filename = time().$file->getClientOriginalName();
            $file->move('images/user_photo',$filename);
            $photo = Photo::create([
                'file'=>$filename
            ]);
            $photo_id = $photo->id;
        }
        
        User::create([
             'name' => $input['name'],
             'email' => $input['email'],
             'password' => bcrypt($input['password']),
             'role_id' => $input['role_id'],
             'photo_id' => $photo_id,
             'is_active' => $input['is_active']
        ]);

        Session::flash('message','The user has been created !');
        Session::flash('alert-class','alert alert-info');

        return redirect(route('admin.users.index'));
        //
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        $status = array('0'=>'Not Active','1'=>'Active');

        return view('admin.users.edit',compact('user','roles','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        $user = User::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo')){

            //Delete Old Img
            if($user->photo && file_exists(public_path().'/images/user_photo/'.$user->photo->file)){
                unlink(public_path().'/images/user_photo/'.$user->photo->file);
            }
            //Add New Img
            $filename = time().$file->getClientOriginalName();
            $file->move('images/user_photo',$filename);
            $photo = Photo::create(['file'=>$filename]);
            $input['photo_id'] = $photo->id;
        }else{
            $input['photo_id'] = 0;
        }
        $user->update($input);
        Session::flash('message','The user has been updated !');
        Session::flash('alert-class','alert alert-success');
        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->photo && file_exists(public_path().'/images/user_photo/'.$user->photo->file)){
            unlink(public_path().'/images/user_photo/'.$user->photo->file);
        }
        $user->delete();
        Session::flash('message','The user has been deleted !');
        Session::flash('alert-class','alert alert-danger');
        return redirect(route('admin.users.index'));
    }
}
