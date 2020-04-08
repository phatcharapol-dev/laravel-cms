@extends('layouts.admin')


@section('content')

<h1>Edit User</h1>

<div class="col-sm-3">
    <img src="{{ $user->photo ? asset('images/user_photo/'.$user->photo->file) : 'https://via.placeholder.com/400'}}" alt="" class="img-responsive img-rounded">
</div>
<div class="col-sm-9">
  {!!Form::open(['method'=>'patch','action' => ['AdminUserController@update',$user->id],'files'=>true])!!}
  <div class="form-group">
    {!! Form::label('name','Name') !!}
    {!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Enter Full Name']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('email','Email Address') !!}
    {!! Form::email('email',$user->email,['class'=>'form-control','placeholder' => 'Enter email']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('role_id','Role') !!}
    {!! Form::select('role_id',$roles,$user->role_id,['class'=>'form-control','placeholder'=>'Choose Role']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('photo','Upload Photo') !!}
    {!! Form::file('photo',['class'=>'form-control-photo']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('is_active','Status') !!}
    {!! Form::select('is_active',$status,$user->is_active,['class'=>'form-control']) !!}
  </div>
  {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
{!!Form::close()!!}

@include('include.form-error')

</div>

  

@endsection


@section('footer')
    
@endsection