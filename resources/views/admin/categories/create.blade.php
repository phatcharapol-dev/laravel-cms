@extends('layouts.admin')


@section('content')

<h1>Create Category</h1>

{!!Form::open(['method'=>'post','action' => 'AdminCategoryController@store','files'=>true])!!}
    <div class="form-group">
      {!! Form::label('name','Category Name') !!}
      {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Category Name']) !!}
    </div>
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
{!!Form::close()!!}


 @include('includes.form-error')

@endsection




@section('footer')
    
@endsection