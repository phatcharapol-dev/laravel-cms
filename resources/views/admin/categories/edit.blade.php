@extends('layouts.admin')


@section('content')

<h1>Edit Category</h1>

{!!Form::open(['method'=>'patch','action' => ['AdminCategoryController@update',$category->id],'files'=>true])!!}
    <div class="form-group">
      {!! Form::hidden('id',$category->id) !!}
      {!! Form::label('name','Category Name') !!}
      {!! Form::text('name',$category->name,['class'=>'form-control','placeholder'=>'Enter Category Name']) !!}
    </div>
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
{!!Form::close()!!}


@endsection




@section('footer')
    
@endsection