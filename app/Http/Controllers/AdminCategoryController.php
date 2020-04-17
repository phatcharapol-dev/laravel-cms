<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryEditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $input = $request->all();
        Category::create($input);
        Session::flash('message','The category has been created !');
        Session::flash('alert-class','alert alert-info');
        return redirect(route('admin.categories.index'));
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEditRequest $request, $id)
    {
        //
        $input = $request->all();
        $category = Category::findOrFail($id);
        $category->update($input);
        Session::flash('message','The category name has been updated !');
        Session::flash('alert-class','alert alert-success');
        return redirect(route('admin.categories.index'));
        
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
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('message','The category name has been deleted !');
        Session::flash('alert-class','alert alert-danger');
        return redirect(route('admin.categories.index'));
    }
}
