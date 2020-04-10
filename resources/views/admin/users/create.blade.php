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

{{-- <form method='POST' action={{route('admin.users.store')}} enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" name='name' class="form-control" id="name" aria-describedby="emailHelp" placeholder="Full Name" >
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" >
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
    </div>
    <div class="form-group">
        <label for="role_id">Role</label>
        <select name="role_id" class="form-control" id="role_id" >
          <option value='' selected>Choose Role</option>
          @foreach($roles as $role)
          <option value={{$role->id}}>{{$role->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="photo">Upload Photo</label>
        <input type="file" class="form-control-photo" id="photo" name="photo">
      </div>
      <div class="form-group">
          <label for="is_active">Status</label>
          <select name="is_active" class="form-control" id="is_active">
            @foreach($status as $value => $name)
                <option value="{{$value}}">{{$name}}</option>
            @endforeach
          </select>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form> --}}



 @include('include.form-error')

@endsection




@section('footer')
    
@endsection