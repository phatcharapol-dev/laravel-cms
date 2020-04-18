@extends('layouts.auth-form')

@section('form')


                <h2>Login</h2>
                {!!Form::open(['method'=>'POST','action' => 'Auth\LoginController@login'])!!}
                <div class="form-group">
                    {!! Form::label('email','E-Mail Address') !!}
                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'john@example.com']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','Password') !!}
                    {!! Form::password('password',['class'=>'form-control','placeholder'=>'password']) !!}
                </div>
                <div class="form-group">
                {!! Form::checkbox('remember',1,['class'=>'form-control']) !!}
                {!! Form::label('remember','Remember Me') !!}
                </div>
          
                {!! Form::submit('Login',['class'=>'btn btn-primary']) !!}

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>

    

@endsection
