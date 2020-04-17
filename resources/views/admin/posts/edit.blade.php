@extends('layouts.admin')


@section('content')

<h1>Edit Post</h1>

<div class="col-sm-3">
    <img src="{{ $post->photo ? asset('images/post_photo/'.$post->photo->file) : 'https://via.placeholder.com/400'}}" alt="" class="img-responsive img-rounded">
</div>
<div class="col-sm-9">
  {!!Form::open(['method'=>'patch','action' => ['AdminPostController@update',$post->id],'files'=>true])!!}
  <div class="form-group">
    {!! Form::label('category_id','Category') !!}
    {!! Form::select('category_id',$categories,$post->category_id,['class'=>'form-control','placeholder'=>'Choose Category']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('photo','Upload Photo') !!}
    {!! Form::file('photo',['class'=>'form-control-photo']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('title','Title') !!}
    {!! Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Enter Full Name']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('body','Body') !!}
    {!! Form::textarea('body',$post->body,['class'=>'form-control','placeholder'=>'Enter Message']) !!}
  </div>
  {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
{!!Form::close()!!}

@include('includes.form-error')

</div>

  

@endsection


@section('footer')
    
@endsection