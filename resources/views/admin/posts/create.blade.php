@extends('layouts.admin')

@section('content')
    
    <h1>Create Post</h1>

    {!!Form::open(['method'=>'post','action' => 'AdminPostController@store','files'=>true])!!}
        <div class="form-group">
        {!! Form::label('title','Title') !!}
        {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Title']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category') !!}
            {!! Form::select('category_id',$categories,0,['class'=>'form-control','placeholder'=>'Choose Categories']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo','Upload Photo') !!}
            {!! Form::file('photo',['class'=>'form-control-photo']) !!}
        </div>
        <div class="form-group">
        {!! Form::label('body','Body') !!}
        {!! Form::textarea('body',null,['class'=>'form-control','placeholder' => 'Message Here']) !!}
        </div>
  

    {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
    {!!Form::close()!!}

    
@endsection


@section('footer')
    
@endsection