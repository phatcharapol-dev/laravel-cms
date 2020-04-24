@extends('layouts.admin')


@section('content')

<h1>Create User</h1>

{!!Form::open(['method'=>'post','action' => 'AdminUserController@store','files'=>true])!!}
    <div class="form-group">
      {!! Form::label('name','Name') !!}
      {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Full Name']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('email','Email Address') !!}
      {!! Form::email('email',null,['class'=>'form-control','placeholder' => 'Enter email']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('password','Password') !!}
      {!! Form::password('password',['class'=>'form-control','placeholder' => 'Password']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('role_id','Role') !!}
      {!! Form::select('role_id',$roles,null,['class'=>'form-control','placeholder'=>'Choose Role']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('photo','Upload Photo') !!}
      {!! Form::file('photo',['class'=>'form-control-photo']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('is_active','Status') !!}
      {!! Form::select('is_active',$status,0,['class'=>'form-control']) !!}
    </div>
    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
{!!Form::close()!!}


@endsection




@section('footer')
    
@endsection